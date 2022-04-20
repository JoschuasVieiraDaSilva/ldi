<?php
include_once 'DBConnection.php';

class Usuario {
    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $tel;
    private $dtNasc;

    function __construct($nome, $email, $senha, $cpf, $tel, $dtNasc) {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setCpf($cpf);
        $this->setTel($tel);
        $this->setDtNasc($dtNasc);
    }
    
    public function save() {
        try {
            $connection = $this->getNewConnection();
            $connection->query(
                'insert into usuario (nome, email, senha, cpf, telefone, dtNasc) values' .
                '("' . $this->getNome() . '",' .
                '"' . $this->getEmail() . '",' .
                '"' . $this->getSenha() . '",' .
                '"' . $this->getCpf() . '",' .
                '"' . $this->getTel() . '",' .
                '"' . $this->getDtNasc() .'")');
            $connection->close();
        } catch (Exception $e) {
            return $connection->getQueryErrno();
        }
        return 0;
    }
    
    private function getNewConnection() {
        return new DBConnection('localhost', 'root', '123456', 'ldi4');
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function getTel() {
        return $this->tel;
    }
    public function setTel($tel) {
        $this->tel = $tel;
    }
    public function getDtNasc() {
        return $this->dtNasc;
    }
    public function setDtNasc($dtNasc) {
        $this->dtNasc = $dtNasc;
    }
}
?>