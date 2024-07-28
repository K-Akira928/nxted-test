<?php
// 課題2 ストラックアウト問題

$height_width = trim(fgets((STDIN)));
$height_width = str_replace(array("\r\n", "\r", "\n"), '', $height_width);
[$height, $width] = explode(" ", $height_width);

function inputBoardHitInfo($height)
{
  $board_lines = [];

  for ($i = 0; $i < $height; $i++) {
    $board_line = trim(fgets((STDIN)));
    $board_line = str_replace(array("\r\n", "\r", "\n"), '', $board_line);
    array_push($board_lines, ...str_split($board_line));
  }
  return $board_lines;
}

function inputBoardScoreInfo($height)
{
  $board_lines = [];

  for ($i = 0; $i < $height; $i++) {
    $board_line = trim(fgets((STDIN)));
    $board_line = str_replace(array("\r\n", "\r", "\n"), '', $board_line);
    array_push($board_lines, ...explode(" ", $board_line));
  }
  return $board_lines;
}

function boardHitScore($height, $width, $hits, $scores)
{
  $score = 0;
  for ($i = 0; $i < ($height * $width); $i++) {
    "o" === $hits[$i] && $score += $scores[$i];
  }
  return $score;
}

$hits = inputBoardHitInfo($height);
$scores = inputBoardScoreInfo($height);

$score = boardHitScore($height, $width, $hits, $scores);
echo $score . "\n";
