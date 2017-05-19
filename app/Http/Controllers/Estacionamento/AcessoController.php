<?php

namespace App\Http\Controllers\Estacionamento;

use App\Clientes;
use App\Vagas;
use App\Rotatividade;
use App\Estacionamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcessoController extends Controller
{
    /**
     * 0 - TAG/CLIENTE NÃO CADASTRADO
     * 1 - TAG/CLIENTE INATIVO
     * 2 - REGISTRA SAIDA
     * 3 - SEM VAGAS
     * 4 - REGISTRA ENTRADA
     */
    public function acesso($tag)
    {
        $clientes = Clientes::where('tag','=',$tag);

        $ativo = $clientes->count();

        /**
         * VERIFICA SE A TAG ESTÁ CADASTRADA
         */
        if ( $ativo == 0 )
        {
            return "0";
        }
        else
        {
            $cliente = $clientes->first();

            /**
             * VERIFICA SE A TAG DO CLIENTE ESTÁ ATIVA
             */
            if ( !$cliente->situacao )
            {
                return "1";
            }
            else
            {
                /**
                 * VERIFICA SE O CLIENTE ESTÁ SAINDO OU ENTRADA NO ESTACIONAMENTO
                 */
                $vagas = new Vagas();

                $rotatividades = new Rotatividade();

                $rotatividade = $rotatividades->where('cliente','=',$cliente->id)->whereNull('saida')->first();

                //  SE HOUVER REGISTRO DE ENTRADA SEM FINALIZAÇÃO É UMA SAÍDA
                if ( count($rotatividade) != 0 )
                {
                    Rotatividade::find($rotatividade->id)->update(['saida' => date('Y-m-d H:i:s')]);

                    Vagas::find(1)->update(['disponiveis' => $vagas->first()->disponiveis+1 ]);

                    return "2";
                }
                else
                {
                    /**
                     * VERIFICA SE TEM VAGA NO ESTACIONAMENTO
                     */
                    if ( $vagas->first()->disponiveis == 0 )
                    {
                        return "3";
                    }
                    else
                    {
                        Rotatividade::create([
                                'cliente' => $cliente->id,
                                'tag' => $cliente->tag,
                                'entrada' => date('Y-m-d H:i:s')]
                        );

                        Vagas::find(1)->update(['disponiveis' => $vagas->first()->disponiveis-1 ]);

                        return "4";
                    }
                }
            }
        }
    }
}