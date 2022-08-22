<?php

    //regra de negocio-interação com banco de dados
    namespace firstApi\models;

    class triangulo
    {
        private static $table = 'triangulo';

        public static function post(int $id){
            //conexão banco de dados com PDO
            $connPdo = new \PDO($dbdrive .':host='.$servername .'; dbname='.$db_name, $username, $password);

            
            //seleciona
            $sql = 'SELECT * FROM' . self::$table.'WHERE id = id';
            //treatment
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0){
                //retornar as informações do usuário
                return $stmt->fetch(\PDO::FETCH_ASSOC);

            } else {
                //mensagem quando dá erro
                throw new \Exception("Nenhum usuário encontrado");
            }

            public static function selectAll(){
                //conexão banco de dados com PDO
                $connPdo = new \PDO($dbdrive .':host='.$servername .'; dbname='.$db_name, $username, $password);
    
                //seleciona
                $sql = 'SELECT * FROM' . self::$table;
                //treatment
                $stmt = $connPdo->prepare($sql);
                $stmt->execute();
    
                if ($stmt->rowCount() > 0){
                    //retornar as informações do usuário
                    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
                } else {
                    //mensagem quando dá erro
                    throw new \Exception("Nenhum usuário encontrado");
                }
            }        
    }