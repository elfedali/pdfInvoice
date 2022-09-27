<?php
// generate an html input form
namespace App\Controller;

class Form
{
    private $action;
    public function __construct($action)
    {
        $this->action = $action;
    }



    public function generate_form($form_data)
    {

        $form = '<form action="' . $this->action . '" method="post" id="form-invoice">';
        foreach ($form_data as $key => $value) {
            $form .= '<div class="mb-3">';
            $form .= '<label for="' . $key . '">' . $value['label'] . '</label>';
            $form .= '<input type="' . $value['type'] . '" name="' . $key . '" id="' . $key . '" value="' . $value['value'] . '" class="form-control">';
            $form .= '</div>';
        }

        // add products description, quantity, price
        $form .= '<div class="mb-3 p-5 bg-light">';
        // add products button  
        $form .= '<div for="products"><strong>Products</strong></div>';
        $form .= '<button type="button" class="btn btn-primary btn-sm" id="add_product">(+) Add Product</button>';
        $form .= '<div id="products" class="mt-2">';
        //products_list
        $form .= '<div id="products_list"></div>';
        $form .= '</div>';
        $form .= '</div>';


        $form .= '<input class="btn btn-success" type="submit" value="Generate PDF">';
        $form .= '</form>';
        return $form;
    }
}