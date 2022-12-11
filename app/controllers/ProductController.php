<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\Brand;
use \App\Models\User;

class ProductController extends \Core\Controller
{
    public function indexAction()
    {
        $title = 'Products';
        $subtitle = 'List of products';
        $models = (new Product)->fetchAll();
        $headers = ['ID', 'Title', 'Category','Brand','Price','Description' ];
        $rows = [];
        foreach ($models as $model) {
            $category = Category::find($model['category']);
            $categoryName = $category ? $category['category'] : "---";
            $rows[] = [
                'id' => $model['id'],
                'title' => $model['title'],
                'category' => $categoryName,
                'brand' => $model['brand'],
                'price' => $model['price'],
                'description' => $model['description'],
            ];
        }
        $brands = (new Brand)->fetchAll();
        $categories = (new Category)->fetchAll();

        View::renderTemplate('admin/products.php', [
            'models' => $models,
            'title' => $title,
            'subtitle' => $subtitle,
            'headers' => $headers,
            'rows' => $rows,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

     // delete
     public function deleteAction()
     {
         $id = $_POST['id'];
         $model = new Product;
         $model->delete($id);

            return $this->response([
                'success' => true,
                'message' => 'Product deleted successfully',
            ]);
     }
 
     // store
     public function createAction()
     {
        $validate = $this->validate([
            'name' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'description' => 'required',
            'discount' => 'required',
            'newarrival' => 'required',
            'featured' => 'required',
            'trending' => 'required',
            'dealoftheday' => 'required',
            'sold'=> 'required',
            'stock' => 'required',
            'keywords' => 'required'
        ]);

        if (!$validate) {
            return;
        }

        // upload image 1 to public/images/products
        $image1 = $_FILES['image1'];
        $image1Name = $image1['name'];
        $image1TmpName = $image1['tmp_name'];
        $image1Size = $image1['size'];
        $image1Error = $image1['error'];
        $image1Type = $image1['type'];

        $image1Ext = explode('.', $image1Name);
        $image1ActualExt = strtolower(end($image1Ext));

        $allowed = ['jpg', 'jpeg', 'png','webp'];

        if (in_array($image1ActualExt, $allowed)) {
            if ($image1Error === 0) {
                if ($image1Size < 1000000) {
                    $image1NewName = uniqid('', true) . "." . $image1ActualExt;
                    $image1Destination = $_SERVER['DOCUMENT_ROOT'] . "/" . SITE_FOLDER . "/public/images/products/" . $image1NewName;
                    move_uploaded_file($image1TmpName, $image1Destination);
                } else {
                    echo "Your image is too big!";
                }
            } else {
                echo "There was an error uploading your image!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }

        // upload image 2 to public/images/products

        $image2 = $_FILES['image2'];
        $image2Name = $image2['name'];
        $image2TmpName = $image2['tmp_name'];
        $image2Size = $image2['size'];
        $image2Error = $image2['error'];
        $image2Type = $image2['type'];

        $image2Ext = explode('.', $image2Name);
        $image2ActualExt = strtolower(end($image2Ext));

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($image2ActualExt, $allowed)) {
            if ($image2Error === 0) {
                if ($image2Size < 1000000) {
                    $image2NewName = uniqid('', true) . "." . $image2ActualExt;
                    $image2Destination = $_SERVER['DOCUMENT_ROOT'] . "/" . SITE_FOLDER ."/public/images/products/" . $image2NewName;
                    move_uploaded_file($image2TmpName, $image2Destination);
                } else {
                    echo "Your image is too big!";
                }
            } else {
                echo "There was an error uploading your image!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }

        // store data to database
        $model = new Product;
        $model->title = $_POST['name'];
        $model->category = $_POST['category'];
        $model->brand = $_POST['brand'];
        $model->price = $_POST['price'];
        $model->description = $_POST['description'];
        $model->discount = $_POST['discount'];
        $model->image1 = $image1NewName;
        $model->image2 = $image2NewName;
        $model->new_arrival = $_POST['newarrival'] ? 1 : 0;
        $model->featured = $_POST['featured'] ? 1 : 0;
        $model->trending = $_POST['trending'] ? 1 : 0;
        $model->deal_of_the_day = $_POST['dealoftheday'] ? 1 : 0;
        $model->sold = $_POST['sold'];
        $model->stock = $_POST['stock'];
        $model->keywords = $_POST['keywords'];
        $model->rating = 0;
        $model->save();
        
        return $this->response([
            'success' => true,
            'message' => 'Product created successfully',
        ]);
     }
}