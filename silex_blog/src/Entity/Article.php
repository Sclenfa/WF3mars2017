<?php


namespace Entity;


class Article
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $shortContent;

    /**
     * @var Category
     *
     */
    private $category;

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCategoryId(){
        if(!is_null($this->category)){
            return $this -> category -> getId();
        }

        return null;
    }

    /**
     * @return string
     */
    public function getCategoryName(){
        if(!is_null($this->category)){
            return $this -> category -> getName();
        }

        return '';
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Article
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortContent()
    {
        return $this->shortContent;
    }

    /**
     * @param string $shortContent
     * @return Article
     */
    public function setShortContent($shortContent)
    {
        $this->shortContent = $shortContent;
        return $this;
    }


}