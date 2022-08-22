<?php

    namespace firstApi\services;
    use firstApi\models\user;

    class userService
    {
        //pegar dados do usuário
        public function get($id = null)
        {
            //se existir um id.:quero pegar um usuário só
            if ($id){
                return $user::select($id);
            } else {
                return user::selectAll();

            }
        }

        //inserir um usuário
        public function post()
        {
            $data = $_POST;

            user::insert($data);
        }

        //alterar dados do usuário
        public function update()
        {

        }

        //deletar usuário
        public function delete()
        {

        }


    }