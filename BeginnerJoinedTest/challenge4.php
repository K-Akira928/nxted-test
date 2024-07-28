<?php
// 課題4 幸運な日計算プログラム

/**
 * 幸運な日をカウントする
 *
 * @param int $fortune_day
 *
 * @var int $day_count
 * @var int $length
 *
 * @return $day_count
 */
function getFortuneDays($fortune_day)
{
  $day_count = 0;
  $length = mb_strlen($fortune_day);

  // 0 が付く日付の総数(9 + 19 + 19 + 16)
  if ($fortune_day == 0) return $day_count = 63;

  if ($length == 1) {
    // 0 ~ 300 までの数
    $day_count += 19 * 2;
    $fortune_day < 3 ? $day_count += 100 : $day_count += 19;
    $fortune_day == 3 && $day_count += 49;

    // 300 ~ 364 までの数
    $day_count += 16;
    $fortune_day == 5 && $day_count -= 1;
    $fortune_day == 6 && $day_count -= 5;
    ($fortune_day > 6 && $fortune_day < 10) && $day_count -= 10;
  } elseif ($length == 2) {
    // 自身
    $day_count += 1;
    // 65未満は 1nn ~ 2nn ~ 3nn で3つ追加
    $fortune_day < 65 && $day_count += 3;
    // 65以上は 1nn ~ 2nn で2つ追加
    $fortune_day >= 65 && $day_count += 2;
    // 35以下は $fortune_day + n(0~9) で10追加
    $fortune_day <= 35 && $day_count += 10;
    // ゾロ目は -1 する
    in_array($fortune_day, [11, 22, 33]) && $day_count -= 1;
    // 36 は 36n(0~4) の5つを追加
    $fortune_day == 36 && $day_count += 5;
  } else {
    $day_count += 1;
  }
  return $day_count;
}

$fortune_day = trim(fgets((STDIN)));
$fortune_day = str_replace(array("\r\n", "\r", "\n"), '', $fortune_day);

echo (getFortuneDays($fortune_day) . "\n");
