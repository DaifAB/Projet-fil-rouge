<?php

    class USER {
        public $id;
        public $username;
        public $email;
        public $password;
        public $firstname;
        public $lastname;
        public $phone;
        public $role;


        public function UpdateInfromation($conn){

            $update_query = mysqli_query($conn,"UPDATE user SET username = '" . $this->username . "', email = '" . $this->email . "', firstname = '" . $this->firstname . "' , lastname = '". $this->lastname ."', phone = '". $this->phone ."' WHERE id = '" . $this->id . "'");

            header("Location: profile.php");


        }

        public function ChangePassword($conn,$hashedpassword){

            $update_query = mysqli_query($conn,"UPDATE user SET password = '" . $hashedpassword . "' WHERE id = '" . $this->id . "'");



        }



}

    class ANNOUNCEMENT{
        public $id;
        public $title;
        public $content;
        public $img;
        public $interr;
        public $ninterr;
        public $date;
        public $loc;
        public $report;
        public $vuecounter;
        public $user_id;
        public $dom_id;


        public function deletAnn($conn){

            $sqldel = "DELETE FROM announcement WHERE id=$this->id";
            return $result = $conn->query($sqldel);


        }

        public function updateAnn($conn){

            $update_query = mysqli_query($conn,"UPDATE announcement SET title = '" . $this->title . "', content = '" . $this->content . "', img = '" . $this->img . "', localisation = '" . $this->loc . "', dom_id = '" . $this->dom_id . "'  WHERE id = '" . $this->id . "'");
            

            header("Location: profile.php");


        }
    }


    class DOMAIN{
        public $id;
        public $name;
        public $img;

        public function updateDomain($conn){

            $update_query = mysqli_query($conn,"UPDATE domain SET name = '" . $this->name . "', img = '" . $this->img . "' WHERE id = '" . $this->id . "'");
            

            header("Location: domanage.php");

        }

    }


    

    



?>















<!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->
