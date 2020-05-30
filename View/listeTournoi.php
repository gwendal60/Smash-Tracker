<div class="contenu">
  <h2>Liste des tournois que vous organiser</h2>
  <table>
    <tr>
      <th>Nom du tournoi</th>
      <th>Modifier</th>
    </tr>
      <?php
      foreach ($lesTournois as $unTournoi) {
        $nomTournoi = $unTournoi['nom'];
        echo "<tr>";
        echo "<td>$nomTournoi</td>";
        echo "<td><a href='index.php?uc=GestionDesProduits&action=Modifier&codeProduit='>Modifier</a></td>";
        echo "</tr>";
      }
      ?>
  </table>
</div>