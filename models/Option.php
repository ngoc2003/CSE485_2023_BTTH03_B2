<?php
Class Option{
    private $id;
    private $question_id;
    private $option;
    private $is_correct;
    private $created_at;
    private $updated_at;

    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getAllOption() {
        $query = $this->db->query('select * from options');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function save() {
        $query = $this->db->prepare('Update option set question_id = :question_id, option = :option , is_correct =: is_corect where id =:id');
        $query->bindParam(':question_id', $this->question_id, PDO::PARAM_STR);
        $query->bindParam(':option', $this->option, PDO::PARAM_STR);
        $query->bindParam(':is_correct', $this->is_correct,PDO ::PARAM_BOOL);
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }
    public function getOptionById($OptionId) {
        $query = $this->db->prepare('SELECT * FROM options WHERE id = :id');
        $query->bindParam(':id',$optionId, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function store() {
        $query = $this->db->prepare('INSERT INTO options (question_id,option,is_correct) VALUES (:question_id;:option;:is_correct)');
        $query->bindParam(':question_id', $this->question_id, PDO::PARAM_STR);
        $query->bindParam(':option', $this->option, PDO::PARAM_STR);
        $query->bindParam(':is_correct', $this->is_correct,PDO ::PARAM_BOOL);
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM options WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of question_id
     */ 
    public function getQuestion_id()
    {
        return $this->question_id;
    }

    /**
     * Set the value of question_id
     *
     * @return  self
     */ 
    public function setQuestion_id($question_id)
    {
        $this->question_id = $question_id;

        return $this;
    }

    /**
     * Get the value of option
     */ 
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Set the value of option
     *
     * @return  self
     */ 
    public function setOption($option)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get the value of is_correct
     */ 
    public function getIs_correct()
    {
        return $this->is_correct;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Set the value of is_correct
     *
     * @return  self
     */ 
    public function setIs_correct($is_correct)
    {
        $this->is_correct = $is_correct;

        return $this;
    }
}
?>