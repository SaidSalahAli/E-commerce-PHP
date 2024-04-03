<?php include "style/header.php"?>

<div id="wrapper">

    <!-- Sidebar -->

    <?php include "style/sidebar.php"?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">view Messages</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $all_messages = $con->query("SELECT * FROM `messages`");
                    foreach($all_messages as $key => $message):
                    ?>
                    <tr class='<?php echo $message['status']>=1 ? 'read' : '' ?>'>
                        <th scope="row"><?php echo ++$key ?></th>
                        <td><?php echo $message['name'] ?></td>
                        <td><?php echo $message['phone'] ?></td>
                        <td><?php echo $message['email'] ?></td>
                        <td class='status'><?php echo $message['status']==0?"unread" :"read"?></td>

                        <td>


                            <!-- Button trigger modal -->
                            <button type="button" id_ms="<?php echo $message['id'] ?>"
                                class="btn btn-primary view_message" data-toggle="modal"
                                data-target="#exampleModal<?php echo $message['id'] ?>">
                                view Messages
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $message['id'] ?>" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Message
                                                from :<?php echo $message['name'] ?> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $message['message'] ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>

            <?php include "style/footer.php"?>