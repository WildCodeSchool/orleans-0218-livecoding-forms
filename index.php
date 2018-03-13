<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Livecoding form</title>
</head>

<body>
<main class="container">
    <h1>Livecoding formulaires</h1>


<?php
    if (!empty($_POST)) {
        if (empty($_POST['name'])) {
            $errors['name'] = 'Le nom ne doit pas être vide';
        }
        if (empty($_POST['email'])) {
            $errors['email'] = 'L\'email est obligatoire';
        }
        if (empty($_POST['message'])) {
            $errors['message'] = 'Le message est obligatoire';
        }
        if (empty($_POST['subject'])) {
            $errors['subject'] = 'Le sujet est obligatoire';
        }
        if (empty($_POST['tel'])) {
            $errors['tel'] = 'Le tel est obligatoire';
        } elseif (strlen($_POST['tel']) !== 10 ) {
            $errors['tel'] = 'Le tel doit faire 10 caractères';
        }

        if (empty($errors)) : ?>
            <h2>Success</h2>
            <ul class="alert alert-success">
                <li><?= htmlentities($_POST['name']) ?></li>
                <li><?= htmlentities($_POST['email']) ?></li>
                <li><?= htmlentities($_POST['message']) ?></li>
                <li><?= htmlentities($_POST['tel']) ?></li>
                <li><?= htmlentities($_POST['subject']) ?></li>
            </ul>
        <?php endif; 
    }

?>



        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="John Doe"
                       value="<?php if (!empty($errors)) :
                                echo htmlentities($_POST['name']);
                        endif; ?>" />
                <?php
                    if (!empty($errors['name'])) : ?>
                        <div class="text-danger">
                            <span class="glyphicon glyphicon-warning-sign"></span><?= $errors['name'] ?>
                        </div>
                    <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">email:</label>
                <input name="email" type="email" class="form-control" id="email"
                       placeholder="john.doe@free.fr"
                       value="<?php if (!empty($errors)) :
                           echo htmlentities($_POST['email']);
                       endif; ?>" />

                <?php if (!empty($errors['email'])) : ?>
                <div class="text-danger">
                    <span class="glyphicon glyphicon-warning-sign"></span><?= $errors['email'] ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="message">message:</label>
                <textarea name="message" class="form-control" id="message" rows="10"
                          placeholder="Enter your message"
                    ><?php if (!empty($errors)) :
                        echo htmlentities($_POST['message']);
                    endif; ?></textarea>

                <?php if (!empty($errors['message'])) : ?>
                    <div class="text-danger">
                        <span class="glyphicon glyphicon-warning-sign"></span><?= $errors['message'] ?>
                    </div>
                <?php endif; ?>

            </div>

            <div class="form-group">
                <label for="tel">phone number:</label>
                <input name="tel" type="tel" class="form-control" id="tel" placeholder="0612345678"
                       value="<?php if (!empty($errors)) :
                           echo htmlentities($_POST['tel']);
                       endif; ?>" />
                <?php if (!empty($errors['tel'])) : ?>
                    <div class="text-danger">
                        <span class="glyphicon glyphicon-warning-sign"></span><?= $errors['tel'] ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="subject">subjet:</label>
                <select name="subject" class="form-control" id="subjet" >
                      <option value=""></option>
                      <?php
                        $options = [
                                '1'=>'Subject 1',
                                '2'=>'Subject 2',
                                '3'=>'Subject 3',
                                '4'=>'Subject 4',
                            ];
                    foreach ($options as $optionValue => $optionLabel) : ?>
                        <option value="<?=$optionValue?>"
                            <?php if(!empty($errors) && $_POST['subject']==$optionValue) echo 'selected'; ?>
                        ><?= $optionLabel?>
                        </option>
                    <?php endforeach; ?>

                </select>
                <?php if (!empty($errors['subject'])) : ?>
                    <div class="text-danger">
                        <span class="glyphicon glyphicon-warning-sign"></span><?= $errors['subject'] ?>
                    </div>
                <?php endif; ?>
            </div>

            <button class="btn btn-primary" type="submit">Send</button>

        </form>
    </main>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>