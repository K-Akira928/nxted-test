<?php
// 課題2 ストラックアウト問題

$height_width = trim(fgets((STDIN)));
$height_width = str_replace(array("\r\n", "\r", "\n"), '', $height_width);
[$height, $width] = explode(" ", $height_width);

/**
 * ヒット情報を配列化
 *
 * @param int $height
 *
 * @var string[] $board_lines
 *
 * @return string[] $board_lines
 */
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

/**
 * ヒットした箇所のスコアを配列化
 *
 * @param int $height
 *
 * @var int[] $board_lines
 *
 * @return int[] $board_lines
 */
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

/**
 * ヒット情報とスコア情報でスコアを計算する
 *
 * @param int $height
 * @param int $width
 * @param int[] $hits
 * @param int[] $scores
 *
 * @var int $score
 *
 * @return int $score
 */
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
