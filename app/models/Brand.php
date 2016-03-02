<?php

  class Brand extends Eloquent{

    protected $fillable = ['name'];


    //Relacion

    public function categories(){

        return $this->belongsToMany('Category', 'brands_categories');

    }




  }
