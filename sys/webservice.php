<?php
include_once '../autoload.php';

namespace sys;

use vendor\nusoap\lib\nusoap;
use sys\model\Usuario;
use sys\model\Tarefa;


function getUsuarios()
{
    $usuario = new Usuario();
    $sql = "SELECT * FROM usuarios";
    $usuarios = $usuario->find($sql);
    $result = array();
    foreach ($usuarios as $usuario) {
        $result[] = array(
            'id' => $usuario->getId(),
            'nome' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'nascimento' => $usuario->getNascimento(),
            'senha' => $usuario->getSenha(),
            );
    }

    return $result;
}
function getTarefas()
{
    $tarefa = new Tarefa();
    $sql = "SELECT * FROM tarefas";
    $tarefas = $tarefa->find($sql);
    $result = array();
    foreach ($tarefas as $tarefa) {
        $result[] = array(
            'id' => $tarefa->getId(),
            'criadorId' => $tarefa->getCriadorid(),
            'executorId' => $tarefa->getExecutorid(),
            'nome' => $tarefa->getNome(),
            'importancia' => $tarefa->getImportancia(),
            'dataCriacao' => $tarefa->getDatacriacao(),
            'dataInicio' => $tarefa->getDatainicio(),
            'dataLimite' => $tarefa->getDatalimite(),
            'descricao' => $tarefa->getDescricao(),
            'concluido' => $tarefa->getConcluido(),
        );
    }
    return $result;
}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server = new soap_server;
$server->configureWSDL('addressbook1', 'urn:'.$_SERVER['SCRIPT_URI']);

$server->wsdl->addComplexType(
    'Usuario',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array(
            'name'=> 'id',
            'type'=>'xsd:string'
        ),
        'nome' => array(
            'name'=> 'nome',
            'type'=>'xsd:string'
        ),
        'email' => array(
            'name'=> 'email',
            'type'=>'xsd:string'
        ),
        'nascimento' => array(
            'name'=> 'nascimento',
            'type'=>'xsd:string'
        ),
        'senha' => array(
            'name'=> 'senha',
            'type'=>'xsd:string'
        )
    )
);

$server->wsdl->addComplexType(
    'UsuarioArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Usuario[]')
    ),
    'tns:Usuario'
);

$server->wsdl->addComplexType(
    'Tarefa',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array(
            'name' => 'id',
            'type' => 'xsd:string'
        ),
        'criadorId' => array(
            'name' => 'criadorId',
            'type' => 'xsd:string'
        ),
        'executorId' => array(
            'name' => 'executorId',
            'type' => 'xsd:string'
        ),
        'nome' => array(
            'name' => 'nome',
            'type' => 'xsd:string'
        ),
        'importancia' => array(
            'name' => 'importancia',
            'type' => 'xsd:string'
        ),
        'dataCriacao' => array(
            'name' => 'dataCriacao',
            'type' => 'xsd:string'
        ),
        'dataInicio' => array(
            'name' => 'dataInicio',
            'type' => 'xsd:string'
        ),
        'dataLimite' => array(
            'name' => 'dataLimite',
            'type' => 'xsd:string'
        ),
        'descricao' => array(
            'name' => 'descricao',
            'type' => 'xsd:string'
        ),
        'concluido' => array(
            'name' => 'concluido',
            'type' => 'xsd:string'
        )
    )
);

$server->wsdl->addComplexType(
    'TarefaArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Tarefa[]')
    ),
    'tns:Tarefa'
);

$server->register(
    'getUsuarios', //Nome da Função
    array(), //Parâmetros de Entrada
    array('return' => 'tns:UsuarioArray'), //Parâmetros de saída
    'urn:'.$_SERVER['SCRIPT_URI'], // namespace
    'urn:'.$_SERVER['SCRIPT_URI']."#getUsuarios", // soapaction
    'rpc', // style
    'encoded', // use
    'Retorna os usuários cadastrados no servidor'
    );


$server->register(
    'getTarefas', //Nome da Função
    array(), //Parâmetros de Entrada
    array('return' => 'tns:TarefaArray'), //Parâmetros de saída
    'urn:'.$_SERVER['SCRIPT_URI'], // namespace
    'urn:'.$_SERVER['SCRIPT_URI']."#getTarefas", // soapaction
    'rpc', // style
    'encoded', // use
    'Retorna as tarefas cadastrados no servidor'
    );

$server->wsdl->schemaTargetNamespace = $_SERVER['SCRIPT_URI'];
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)?$HTTP_RAW_POST_DATA:"";
$server->service($HTTP_RAW_POST_DATA);
exit();
