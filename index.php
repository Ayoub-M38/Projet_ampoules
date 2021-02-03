<?php


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=ecommerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include_once "header.php";

$statement = $pdo->prepare('SELECT * FROM ampoules ORDER BY date_changement DESC');
$statement->execute();
$bulbs = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container mt-5">
    <h1>Projet ampoules</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">
        Ajouter une opération
    </button>

    <!-- Add bulb -->
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une opération</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add.php" method="post">
                        <div class="form-group">
                            <label for="date_changement"></label>
                            <input type="date" class="form-control" name="date_changement" id="date_changement">
                        </div>
                        <div class="form-group">
                            <label for="etage">Selection étage</label>
                            <select class="form-control" id="etage" name="etage">
                                <option value="RDC">RDC</option>
                                <option value="Etage 1">Etage 1</option>
                                <option value="Etage 2">Etage 3</option>
                                <option value="Etage 3">Etage 3</option>
                                <option value="Etage 4">Etage 4</option>
                                <option value="Etage 5">Etage 5</option>
                                <option value="Etage 6">Etage 6</option>
                                <option value="Etage 7">Etage 7</option>
                                <option value="Etage 8">Etage 8</option>
                                <option value="Etage 9">Etage 9</option>
                                <option value="Etage 10">Etage 10</option>
                                <option value="Etage 11">Etage 11</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Selection étage</label>
                            <select class="form-control" id="etage" name="position_ampoule">
                                <option value="droite">DROITE</option>
                                <option value="gauche">GAUCHE</option>
                                <option value="fond">FOND</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prix_ampoule">Prix</label>
                            <input type="number" step="any" class="form-control" name="prix_ampoule" id="prix_ampoule">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Ajouter l'opération</button>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- List Table -->
    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">id#</th>
            <th scope="col">Date</th>
            <th scope="col">Etage</th>
            <th scope="col">Position</th>
            <th scope="col">Prix</th>
            <th scope="col">Détails</th>
            <th scope="col">Mettre a jour</th>
            <th scope="col">Supprimer</th>

        </tr>
        </thead>
        <?php
        foreach ($bulbs as $bulb) :
        $date_eu = new DateTime($bulb['date_changement']);
        ?>
        <tr>
            <td><?php echo $bulb['id_ampoule'] ?></td>
            <td><?php echo $date_eu->format('d-m-Y') ?></td>
            <td><?php echo $bulb['etage'] ?></td>
            <td><?php echo $bulb['position_ampoule'] ?></td>
            <td><?php echo $bulb['prix_ampoule'] ?></td>
            
            <!--info pop up-->
            <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detailsAmpoule<?= $bulb['id_ampoule'] ?>">
                    Détails de l'opération
                </button>

                <!-- Modal -->
                <div class="modal fade" id="detailsAmpoule<?= $bulb['id_ampoule'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Détail de l'opération N° <?= $bulb['id_ampoule'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li><?= "ID de opération : " .$bulb['id_ampoule'] ?></li>
                                    <li><?= "Date de changement : " .$date_eu->format('d/m/Y'); ?></li>
                                    <li><?= "Étage : " .$bulb['etage'] ?></li>
                                    <li><?= "Position ampoule : " .$bulb['position_ampoule'] ?></li>
                                    <li><?= "Prix : " .$bulb['prix_ampoule'] ?> €</li>
                                </ul>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <!-- update pop up-->
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#update<?= $bulb['id_ampoule'] ?>">
                    Mise a jour de l'opération
                </button>

                <div class="modal fade" id="update<?= $bulb['id_ampoule'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mise a jour de l'opération ID# <?= $bulb['id_ampoule'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="update.php?id=<?= $bulb['id_ampoule'] ?>" method="post">
                                    <div class="form-group">
                                        <label for="date_changement"></label>
                                        <input type="date" class="form-control" name="date_changement" id="date_changement">
                                    </div>
                                    <div class="form-group">
                                        <label for="etage">Selection étage</label>
                                        <select class="form-control" id="etage" name="etage">
                                            <option value="RDC">RDC</option>
                                            <option value="Etage 1">Etage 1</option>
                                            <option value="Etage 2">Etage 3</option>
                                            <option value="Etage 3">Etage 3</option>
                                            <option value="Etage 4">Etage 4</option>
                                            <option value="Etage 5">Etage 5</option>
                                            <option value="Etage 6">Etage 6</option>
                                            <option value="Etage 7">Etage 7</option>
                                            <option value="Etage 8">Etage 8</option>
                                            <option value="Etage 9">Etage 9</option>
                                            <option value="Etage 10">Etage 10</option>
                                            <option value="Etage 11">Etage 11</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="position">Selection étage</label>
                                        <select class="form-control" id="etage" name="position_ampoule">
                                            <option value="droite">DROITE</option>
                                            <option value="gauche">GAUCHE</option>
                                            <option value="fond">FOND</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="prix_ampoule"></label>
                                        <input type="number" value="<?= $bulb['prix_ampoule'] ?>" step="any" class="form-control" name="prix_ampoule" id="prix_ampoule">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Mettre a jour l'opération</button>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <!-- delete pop up-->
            <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $bulb['id_ampoule'] ?>">
                    Supprimer l'opération
                </button>

                <div class="modal fade" id="delete<?= $bulb['id_ampoule'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Détail de l'opération N° <?= $bulb['id_ampoule'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <a href="delete.php?id_delete=<?= $bulb['id_ampoule'] ?>" class="btn btn-danger">SUPPRIMER CETTE OPÉRATION</a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>

            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>



</body>
</html>