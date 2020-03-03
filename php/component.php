<?php

function inputElement(){
    $ele = "
    
    <div class=\"py-2\">
            <div class=\"input-group mb-2\">
                <div class=\"input-group-prepend\">
                <div class=\"input-group-text bg-warning\"><i class=\"fas fa-id-badge\"></i></div>
                </div>
                <input type=\"text\" autocomplete=\"off\" placeholder=\"ID\" class=\"form-control\" id=\"inlineFormInputGroup\">
            </div>
    
    ";
    echo $ele;

}