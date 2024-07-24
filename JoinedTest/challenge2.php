<?php
// 課題2 プログラム時間シミュレーション問題
function program_work_simulation($n, $x, $f, $s)
{
  $x = ceil(($x / 10)) * 10;
  $work_time = 0;
  $work_rows = 0;
  $hour_working_effect = $x;

  while ($n > $work_rows) {
    //回復効果を 初期毎時作業量 < 現毎時間作業量 + 回復量 の分岐で初期毎時作業量の値を超えないように算出
    $sleeping_effect = $x < $hour_working_effect + $s
      ? $x - $hour_working_effect
      : $s + $hour_working_effect;

    // 3時間作業時の期待効果を算出
    $three_hour_working_effect = $hour_working_effect * 3 - $f * 2;

    // 3時間での作業量と回復の期待効果を比較する
    if ($three_hour_working_effect >= $sleeping_effect) {
      $work_time += 1;
      $work_rows += $hour_working_effect;
      $hour_working_effect -= $f;
      // 作業があと1作業で終わるかどうか検証する
    } elseif ($n - $work_rows <= $hour_working_effect) {
      $work_time += 1;
      $work_rows += $hour_working_effect;
      $hour_working_effect -= $f;
    } else {
      $work_time += 3;
      // 睡眠で得られる回復効果は上限Nまで
      $hour_working_effect = $sleeping_effect > $hour_working_effect
        ? $x
        : $sleeping_effect;
    }
  }
  return $work_time;
}

$input_line = trim(fgets((STDIN)));
$input_line = str_replace(array("\r\n", "\r", "\n"), '', $input_line);
[$n, $x, $f, $s] = explode(" ", $input_line);

echo program_work_simulation($n, $x, $f, $s) . "\n";
