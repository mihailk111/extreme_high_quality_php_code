<?php


class Card
{
    public function __construct($title, $text, $link, $creator)
    {
        $this->title = $title;
        $this->text = $text;
        $this->link = $link;
        $this->creator = $creator;
    }
}
?>