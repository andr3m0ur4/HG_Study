<?php

    namespace App\Models;

    use Lib\Model\Model;

    class User extends Model
    {
        public static $id;

        public static function get()
        {
            $query = 'SELECT * FROM users';

            $stmt = PARENT::$db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function getLeaders()
        {
            $query = 'SELECT * FROM users WHERE type_user = 1';

            $stmt = PARENT::$db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function find($id)
        {
            $query = 'SELECT * FROM users WHERE id = :id';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $data = $stmt->fetchObject(__CLASS__);
            SELF::$id = $data->id;

            return $data;
        }

        public static function getExperiences($id)
        {
            $query = 'SELECT * FROM experiences WHERE id_user = :id_user';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_user', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function getProjects($id)
        {
            $query = 'SELECT * FROM projects WHERE id_user = :id_user';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_user', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function getCertificates($id)
        {
            $query = 'SELECT * FROM certificates WHERE id_user = :id_user';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_user', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function create($data)
        {
            $query = '
                INSERT INTO users (name, last_name, email, password, city, state, type_user)
                VALUES (:name, :last_name, :email, :password, :city, :state, :type_user)
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':name', $data->name);
            $stmt->bindValue(':last_name', $data->last_name);
            $stmt->bindValue(':email', $data->email);
            $stmt->bindValue(':password', $data->password);
            $stmt->bindValue(':city', $data->city);
            $stmt->bindValue(':state', $data->state);
            $stmt->bindValue(':type_user', $data->type_user);
            $stmt->execute();

            return PARENT::$db->lastInsertId();
        }

        public static function where($field, $value)
        {
            $query = "
                SELECT email, password FROM users WHERE {$field} = :{$field}
            ";

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(":$field", $value);
            $stmt->execute();

            return $stmt->fetchObject();
        }

        public function update($data)
        {
            $query = '
                UPDATE users
                SET
                    name = :name,
                    last_name = :last_name,
                    password = :password,
                    job = :job,
                    description = :description,
                    current_job = :current_job,
                    city = :city,
                    state = :state,
                    biography = :biography,
                    facebook = :facebook,
                    twitter = :twitter,
                    instagram = :instagram,
                    github = :github,
                    picture = :picture
                WHERE id = :id
            ';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':name', $data->name);
            $stmt->bindValue(':last_name', $data->last_name);
            $stmt->bindValue(':password', $data->password);
            $stmt->bindValue(':job', $data->job);
            $stmt->bindValue(':description', $data->description);
            $stmt->bindValue(':current_job', $data->current_job);
            $stmt->bindValue(':city', $data->city);
            $stmt->bindValue(':state', $data->state);
            $stmt->bindValue(':biography', $data->biography);
            $stmt->bindValue(':facebook', $data->facebook);
            $stmt->bindValue(':twitter', $data->twitter);
            $stmt->bindValue(':instagram', $data->instagram);
            $stmt->bindValue(':github', $data->github);
            $stmt->bindValue(':picture', $data->picture);
            $stmt->bindValue(':id', SELF::$id);
            $stmt->execute();

            return $stmt;
        }
    }
