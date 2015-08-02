<?php

/*
 * The MIT License (MIT)
 *   
 * Copyright (c) 2015 Adapt Framework (www.adaptframework.com)
 * Authored by Matt Bruton (matt@adaptframework.com)
 *   
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *   
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *   
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *  
 */

namespace extensions\social{
    
    /* Prevent direct access */
    defined('ADAPT_STARTED') or die;
    
    /*
     * This class should be named social_model, however
     * the "_" means that it cannot be used as a handler.
     * Naming it just 'social' allows it to be registered as
     * a handler and so if you had a table named 'post' you
     * could access it without social things such as likes
     * by calling 'model_post', because social is a handler
     * you can now call 'social_post' instead and this
     * will give you everything model_post does but it will
     * also give social functionality.
     */
    
    class social extends \frameworks\adapt\model{
        
        protected $_has_likes = false;
        protected $_has_comments = false;
        protected $_has_seen_by = false;
        
        public function __construct($table_name, $id = null, $data_source = null){
            parent::__construct($table_name, $id, $data_source);
            
            if (!is_null($this->table_name)){
                /* This model exists so lets check if the following tables
                 * exist:
                 * - <table_name>_like
                 * - <table_name>_comment
                 * - <table_name>_seen_by
                */
                
                if ($this->data_source->get_row_structure($this->table_name . "_like")){
                    $this->_has_likes = true;
                }
                
                if ($this->data_source->get_row_structure($this->table_name . "_comment")){
                    $this->_has_comments = true;
                }
                
                if ($this->data_source->get_row_structure($this->table_name . "_seen_by")){
                    $this->_has_seen_by = true;
                }
            }
        }
        
        /*
         * Properties
         */
        public function aget_has_likes(){
            return $this->_has_likes;
        }
        
        public function aget_has_comments(){
            return $this->_has_comments();
        }
        
        public function aget_has_seen_by(){
            return $this->_has_seen_by();
        }
        
        
    }
 
}


?>