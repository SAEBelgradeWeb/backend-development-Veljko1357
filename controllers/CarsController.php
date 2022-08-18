<?php

namespace App\Controllers;

use App\Core\App;

class CarsController
{

    //index function shows the cars on page

    public function index()
    {
        check_auth();


        $cars = App::get('db')->selectJoin('cars', 'colors', 'color_name', 'color_id', 'color_id');

        return view('cars', compact('cars'));

    }


    //upload function controls uploading of files
    public function upload()
    {

        check_auth();

        $colors = App::get('db')->selectAll('colors');
        return view('cars-upload', compact('colors'));
    }

    public function store() //Validation and sanitization of every item;;

  //Barely got image upload to work properly, won't work if not placed on top and  App::get('db')->insert('cars', $_POST); has to be placed below it

    {
        check_auth();
        if (isset($_FILES['image'])) {
            if ($_FILES['image']['tmp_name'] != '' or $_FILES['image']['name'] != '') {

                if ($_FILES['image']['type'] == 'image/jpeg'
                    or $_FILES['image']['type'] == 'image/png'
                    or $_FILES['image']['type'] == 'image/jpg') {

                    $uploadDir = getcwd() . "/public/images";
                    $imageName = "vintage-car-" . time() . "_" . $_FILES['image']['name'];


                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . "/" . $imageName);

                    $_POST['image'] = $imageName;


                }
            } else {
                return redirect('/cars');
            }
        }


        App::get('db')->insert('cars', $_POST);

        //car name

        $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        if (!filter_var($_POST['name'], FILTER_VALIDATE_STRING)) {
            return redirect('/cars');
        }

        //car color
        $_POST['color_name'] = filter_var($_POST['color_name'], FILTER_SANITIZE_STRING);


        //price
        $_POST['price'] = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (!filter_var($_POST['price'], FILTER_VALIDATE_FLOAT)) {
            return redirect('/cars');
        }

        //description

        $_POST['description'] = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        if (!filter_var($_POST['description'], FILTER_VALIDATE_STRING)) {
            return redirect('/cars');
        }


//        App::get('db')->insert('cars', $_POST);


        return redirect('/cars');


    }

    public function edit()
    {
        check_auth();
        $car = App::get('db')->select('cars', $_GET);
        return view('cars-edit', compact('car'));

    }

    public function update()
    {
        check_auth();

        //old Image
        $_POST['oldImageName'] = filter_var($_POST['oldImageName'], FILTER_SANITIZE_STRING);

        //id
        $_POST['id'] = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
            redirect('/cars');
        }

        //name
        $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);



        //price
        $_POST['price'] = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (!filter_var($_POST['price'], FILTER_VALIDATE_FLOAT)) {
            return redirect('/cars');
        }




        if ($_FILES['image']['tmp_name'] != '' or $_FILES['image']['name'] != '') {

            if ($_FILES['image']['type'] == 'image/jpeg'
                or $_FILES['image']['type'] == 'image/png'
                or $_FILES['image']['type'] == 'image/jpg') {

                $uploadDir = getcwd() . "/public/images";

                $newImageName = "vintage-car-updated_" . time() . "_" . $_FILES['image']['name'];

                move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . "/" . $newImageName);

                $_POST['image'] = $newImageName;

                if (is_file($uploadDir . "/" . $_POST['oldImageName'])) {

                    unlink($uploadDir . "/" . $_POST['oldImageName']);

                }

            }
        }
        unset($_POST['oldImageName']);
        App::get('db')->update('cars', $_POST);

        return redirect('/cars');

    }

    public function delete()  //couldn't get the image to remove itself from directory on deletion, but everythig else works fine
    {
        check_auth();

        App::get('db')->delete('cars', $_GET);

        return redirect('/cars');
    }


}




