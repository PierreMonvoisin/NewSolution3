<?php // Store user infos in session storage to use them on all pages
require '../share/session.php';
require '../share/forbiddenPages.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <title>Multijoueurs - Solution³</title>
  <?php
  require '../share/requiredHeadTags.html';
  include '../share/fonts.html'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/css/multiplayer.css">
</head>
<body class="bg-gainsboro main_background_color">
  <!-- Header -->
  <?php include '../share/header.php'; ?>
  <div class="container-fluid py-3">
    <h1 class="text-center my-2 main_font_color">Multijoueurs</h1>
    <div class="row mainRow mb-3">
      <div class="mx-auto card-deck col-xl-5 col-md-6">
        <!-- Top left card - Algorithm of the week -->
        <div id="algoCard" class="card mb-0">
          <h3 class="card-header pt-2 text-center bg-blue secondary_font_color">Alg of the week</h3>
          <div class="card-body py-0 main_font_color">
            <p id="algorithm" class="card-title text-center border border-dark border-left-0 border-right-0 mb-0 mt-2">F' L B2 R D2 L2 D2 L' B2 D2 R' F2 R2 F' D' F' R2 D' B U2 F</p>
            <table class="table table-striped text-center main_font_color">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Leaderboard</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Ada Lovelace</td>
                  <td>12:543 s</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Grace Hopper</td>
                  <td>12:960 s</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Margaret Hamilton</td>
                  <td>13:045 s</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Top right card - Online friends -->
      <div class="mx-auto card-deck col-xl-5 col-md-6">
        <div id="friendsCard" class="card">
          <h3 class="card-header text-center bg-orange secondary_font_color">Friends</h3>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center main_font_color">
                Pierre Monvoisin
                <span class="badge badge-success statusBadge">En ligne</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center main_font_color">
                Lily Dubas
                <span class="badge badge-success statusBadge">En ligne</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center main_font_color">
                Felix Zemdegs
                <span class="badge badge-warning statusBadge">Inactif</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center main_font_color">
                Max Park
                <span class="badge badge-danger statusBadge">Hors ligne</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Bottom left card - Battle mode -->
    <div class="row mainRow">
      <div class="mx-auto card-deck col-xl-5 col-md-6">
        <div id="battleCard" class="card">
          <h3 class="card-header text-center bg-red secondary_font_color">Battle mode</h3>
          <div class="card-body py-0">
            <div class="card-deck h-100 align-content-center">
              <div class="card bg-copper stats_background_color">
                <div id="button1v1" class="card-body pt-3">
                  <h4 class="card-title text-center mb-4 secondary_font_color">1 vs 1</h4>
                  <button type="button" class="btn btn-block btn-lg btn-warning py-4">Je suis prêt !</button>
                </div>
              </div>
              <div id="card2v2" class="card bg-copper stats_background_color">
                <div id="button2v2" class="card-body pt-3">
                  <h4 class="card-title text-center mb-4 secondary_font_color">2 vs 2</h4>
                  <button type="button" class="btn btn-block btn-lg btn-light py-4">Je suis prêt !</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Bottom right card - News -->
      <div class="mx-auto card-deck col-xl-5 col-md-6">
        <div id="newsCard" class="card">
          <h3 class="card-header text-center bg-green secondary_font_color">News</h3>
          <div class="card-body">
            <div class="jumbotron py-0 mb-0 text-justify main_font_color">
              <p>
                Strong selfish pious fearful ocean sexuality right revaluation christianity. Superiority merciful merciful prejudice society spirit ideal noble play decrepit hope disgust will. Holiest play morality deceptions horror reason selfish law oneself eternal-return. Hatred oneself truth pinnacle spirit moral. Decrepit of merciful moral endless convictions ultimate. Society dead sea eternal-return snare good selfish enlightenment mountains ultimate fearful god merciful horror.
                Grandeur ultimate strong of play endless moral. Burying passion prejudice eternal-return reason play strong depths pious.
              </p>
              <p>
                Abstract deceptions reason contradict right love ubermensch endless depths disgust aversion. Disgust pious spirit spirit burying disgust truth fearful morality madness selfish.
                Self sexuality hatred reason grandeur virtues holiest endless play ultimate. Christianity morality fearful chaos merciful justice god mountains self. Virtues marvelous of will suicide self burying deceptions deceptions christianity. Ultimate god pious decrepit inexpedient war moral war ideal oneself faith play selfish reason.
              </p>
              <p>
                Law morality eternal-return noble ultimate ascetic. Faith overcome pious self of against of hatred love christianity chaos pinnacle. Free ubermensch zarathustra holiest mountains enlightenment revaluation abstract grandeur fearful passion. Eternal-return decieve convictions decieve eternal-return. Morality revaluation ideal intentions sexuality holiest. Oneself eternal-return christianity dead pinnacle noble will passion philosophy prejudice evil. Ultimate ideal faith will hope reason faithful justice decrepit.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php // Local storage authorization modal
  include '../share/userAuthorization.php';
  // Required scripts
  require '../share/requiredScriptTags.html'; ?>
  <script src="../assets/js/share/settings.js"></script>
  <script src="../assets/js/share/localStorage/loadPersonnalisations.js"></script>
</body>
</html>
