<?php

  class Category extends Eloquent{

    protected $fillable = ['name'];


    //Relacion
    public function brands(){

        return $this->belongsToMany('Brand', 'brands_categories');

    }




  }
