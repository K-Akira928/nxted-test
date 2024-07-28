<?php
// 課題3 RPGお買い物シミュレーション
function rpbBuySimulation()
{
  $_ = trim(fgets((STDIN)));

  $tool_prices = trim(fgets((STDIN)));
  $tool_prices = str_replace(array("\r\n", "\r", "\n"), '', $tool_prices);
  $tool_prices = explode(" ", $tool_prices);

  $initial_tool_info = trim(fgets((STDIN)));
  $initial_tool_info = str_replace(array("\r\n", "\r", "\n"), '', $initial_tool_info);
  [$amount, $order_count] = explode(" ", $initial_tool_info);

  for ($i = 0; $i < $order_count; $i++) {
    $order = trim(fgets(STDIN));
    $order = str_replace(array("\r\n", "\r", "\n"), '', $order);
    [$tool_num, $tool_count] = explode(" ", $order);

    if ($amount >= $tool_prices[$tool_num - 1] * $tool_count) {
      $amount -= $tool_prices[$tool_num - 1] * $tool_count;
    }
  }

  return $amount;
}

echo rpbBuySimulation() . "\n";
