<?php
// 課題2 ストラックアウト問題

$height_width = trim(fgets((STDIN)));
$height_width = str_replace(array("\r\n", "\r", "\n"), '', $height_width);
[$height, $width] = explode(" ", $height_width);

// ヒットしたかどうかを配列化
function input_board_hit_info($height)
{
  $board_lines = [];

  for ($i = 0; $i < $height; $i++) {
    $board_line = trim(fgets((STDIN)));
    $board_line = str_replace(array("\r\n", "\r", "\n"), '', $board_line);
    array_push($board_lines, ...str_split($board_line));
  }
  return $board_lines;
}

// ヒットした箇所のスコアを配列化
function input_board_score_info($height)
{
  $board_lines = [];

  for ($i = 0; $i < $height; $i++) {
    $board_line = trim(fgets((STDIN)));
    $board_line = str_replace(array("\r\n", "\r", "\n"), '', $board_line);
    array_push($board_lines, ...explode(" ", $board_line));
  }
  return $board_lines;
}

// ヒット情報とスコア情報でスコアを計算
function board_hit_score($height, $width, $hits, $scores)
{
  $score = 0;
  for ($i = 0; $i < ($height * $width); $i++) {
    "o" === $hits[$i] && $score += $scores[$i];
  }
  return $score;
}

$hits = input_board_hit_info($height);
$scores = input_board_score_info($height);

$score = board_hit_score($height, $width, $hits, $scores);
echo $score . "\n";
