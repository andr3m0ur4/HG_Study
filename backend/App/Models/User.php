<?php

    namespace App\Models;

    use Lib\Model\Model;

    class User extends Model
    {
        public function __get($attr)
        {
            return $attr;
        }

        public function __set($attr, $value)
        {
            $this->$attr = $value;
        }

        public static function get()
        {
            $query = 'SELECT * FROM users';

            $stmt = PARENT::$db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        }

        public static function getLeaders()
        {
            $query = 'SELECT * FROM users WHERE type_user = 1';

            $stmt = PARENT::$db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        }

        public static function find($id)
        {
            $query = 'SELECT * FROM users WHERE id = :id';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchObject(__CLASS__);
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

            return SELF::find(PARENT::$db->lastInsertId());
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
            foreach ($data as $key => $value) {
                $this->__set($key, $value);
            }

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
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':last_name', $this->last_name);
            $stmt->bindValue(':password', $this->password);
            $stmt->bindValue(':job', $this->job);
            $stmt->bindValue(':description', $this->description);
            $stmt->bindValue(':current_job', $this->current_job);
            $stmt->bindValue(':city', $this->city);
            $stmt->bindValue(':state', $this->state);
            $stmt->bindValue(':biography', $this->biography);
            $stmt->bindValue(':facebook', $this->facebook);
            $stmt->bindValue(':twitter', $this->twitter);
            $stmt->bindValue(':instagram', $this->instagram);
            $stmt->bindValue(':github', $this->github);
            $stmt->bindValue(':picture', $this->picture);
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();

            return $stmt;
        }

        public static function getExperiences($id)
        {
            $query = 'SELECT * FROM experiences WHERE id_user = :id_user';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_user', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function setExperience($data, $id = null)
        {
            if (!isset($id)) {

                $query = '
                    INSERT INTO experiences (description, id_user)
                    VALUES (:description, :id_user)
                ';

                $stmt = PARENT::$db->prepare($query);
                
            } else {

                $query = '
                    UPDATE experiences
                    SET
                        description = :description,
                        id_user = :id_user
                    WHERE
                        id = :id
                ';

                $stmt = PARENT::$db->prepare($query);
                $stmt->bindValue(':id', $id);
            }

            $stmt->bindValue(':description', $data->description);
            $stmt->bindValue(':id_user', $data->id_user);
            $stmt->execute();

            $id = $id ?? PARENT::$db->lastInsertId();

            $query = 'SELECT * FROM experiences WHERE id = :id';
            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchObject();
        }

        public static function deleteExperience($id)
        {
            $query = 'DELETE FROM experiences WHERE id = :id';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $id;
        }

        public static function getProjects($id)
        {
            $query = 'SELECT * FROM projects WHERE id_user = :id_user';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_user', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function setProject($data, $id = null)
        {
            if (!isset($id)) {

                $query = '
                    INSERT INTO projects (description, id_user)
                    VALUES (:description, :id_user)
                ';

                $stmt = PARENT::$db->prepare($query);
                
            } else {

                $query = '
                    UPDATE projects
                    SET
                        description = :description,
                        id_user = :id_user
                    WHERE
                        id = :id
                ';

                $stmt = PARENT::$db->prepare($query);
                $stmt->bindValue(':id', $id);
            }

            $stmt->bindValue(':description', $data->description);
            $stmt->bindValue(':id_user', $data->id_user);
            $stmt->execute();

            $id = $id ?? PARENT::$db->lastInsertId();

            $query = 'SELECT * FROM projects WHERE id = :id';
            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchObject();
        }

        public static function deleteProject($id)
        {
            $query = 'DELETE FROM projects WHERE id = :id';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $id;
        }

        public static function getCertificates($id)
        {
            $query = 'SELECT * FROM certificates WHERE id_user = :id_user';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id_user', $id);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        public static function setCertificate($data, $id = null)
        {
            if (!isset($id)) {

                $query = '
                    INSERT INTO certificates (description, id_user)
                    VALUES (:description, :id_user)
                ';

                $stmt = PARENT::$db->prepare($query);
                
            } else {

                $query = '
                    UPDATE certificates
                    SET
                        description = :description,
                        id_user = :id_user
                    WHERE
                        id = :id
                ';

                $stmt = PARENT::$db->prepare($query);
                $stmt->bindValue(':id', $id);
            }

            $stmt->bindValue(':description', $data->description);
            $stmt->bindValue(':id_user', $data->id_user);
            $stmt->execute();

            $id = $id ?? PARENT::$db->lastInsertId();

            $query = 'SELECT * FROM certificates WHERE id = :id';
            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchObject();
        }

        public static function deleteCertificate($id)
        {
            $query = 'DELETE FROM certificates WHERE id = :id';

            $stmt = PARENT::$db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $id;
        }
    }
