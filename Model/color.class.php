<?php
    //這個類一個對象實例 表示一條紀錄雇員
 class Color{
       private $id;
       private $pan;
       private $guest;
       private $Book_Name;
       private $content;
       private $number;
       private $Remarks;
       private $proportion;
        /**
     * @return the $pan
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return the $pan
     */
    public function getPan()
    {
        return $this->pan;
    }

    /**
     * @return the $guest
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * @return the $Book_Name
     */
    public function getBook_Name()
    {
        return $this->Book_Name;
    }

    /**
     * @return the $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return the $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return the $Remarks
     */
    public function getRemarks()
    {
        return $this->Remarks;
    }

    /**
     * @return the $proportion
     */
    public function getProportion()
    {
        return $this->proportion;
    }
    /**
     * @param field_type $pan
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @param field_type $pan
     */
    public function setPan($pan)
    {
        $this->pan = $pan;
    }

    /**
     * @param field_type $guest
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
    }

    /**
     * @param field_type $Book_Name
     */
    public function setBook_Name($Book_Name)
    {
        $this->Book_Name = $Book_Name;
    }

    /**
     * @param field_type $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param field_type $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param field_type $Remarks
     */
    public function setRemarks($Remarks)
    {
        $this->Remarks = $Remarks;
    }

    /**
     * @param field_type $proportion
     */
    public function setProportion($proportion)
    {
        $this->proportion = $proportion;
    }




       
 }
?>