<?php
/**
 * Created by PhpStorm.
 * User: jatinjohny
 * Date: 27-Sep-15
 * Time: 22:40
 */

class Gallery extends Controller
{

    public function index()
    {
        /**
         * PAGE: index
         * This method handles what happens when you move to http://yourproject/media/index
         */
        $this->loadModel('Photographs');
        $photos =  $this->model->getAllPhotos();
        $page = 'gallery';

        // load views. within the views we can echo out
        require APP_DIR . 'views/_templates/header.php';
        require APP_DIR . 'views/gallery/index.php';
        require APP_DIR . 'views/_templates/footer.php';

    }

    public function image ($id = '')
    {

        if( isset($_POST['deleteComment'])){

            $this->loadModel('Comments');
            $this->model->deleteComment($_POST['commentId']);
        }

        $this->loadModel('Photographs');

        $photo = $this->model->findBy('id', $id);

        if(!$photo) {
            header('location: ' . URL . 'error');
        }

        $this->loadModel('Comments');

        if(isset($_POST['submit'])) {

            $this->model->postCommentOnPhoto($id, time() , $_POST['author'], $_POST['body']);

        }

        $comments = $this->model->getCommentsOfPhoto($id);
        $page = 'gallery';

        // load views. within the views we can echo out
        require APP_DIR . 'views/_templates/header.php';
        require APP_DIR . 'views/gallery/image.php';
        require APP_DIR . 'views/_templates/footer.php';
    }

    public function delete($photoId)
    {
        $this->loadModel('Photographs');
        $this->model->delete($photoId);
        header('location:' . URL . 'gallery');
    }

}