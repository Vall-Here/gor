<?php require_once __DIR__ . '/../config/global.php';
require_once __DIR__ . '/../config/connection.php';
// function getCities()
// {
//   global $conn;
//   $query = 'SELECT * FROM cities';
//   $result = mysqli_query($conn, $query);
//   $cities = [];
//   while ($city = mysqli_fetch_assoc($result)) {
//     array_push($cities, $city);
//   }
//   return $cities;
// }
function getCategories()
{
  global $conn;
  $query = 'SELECT * FROM categories';
  $result = mysqli_query($conn, $query);
  $categories = [];
  while ($category = mysqli_fetch_assoc($result)) {
    array_push($categories, $category);
  }
  return $categories;
}
function getFields()
{
  global $conn;
  $query = 'SELECT * FROM fields';
  $result = mysqli_query($conn, $query);
  $fields = [];
  $sportsArendaIds = [];
  $categoryIds = [];
  while ($field = mysqli_fetch_assoc($result)) {
    // $field['features'] = json_decode($field['features'], true);
    array_push($fields, $field);
    // array_push($sportsArendaIds, $field['sports_arena_id']);
    array_push($categoryIds, $field['category_id']);
  }
  $categoryIdsString = implode(', ', $categoryIds);
  $query = "SELECT * FROM categories WHERE id IN ($categoryIdsString)";
  $result = mysqli_query($conn, $query);
  $categories = [];
  while ($category = mysqli_fetch_assoc($result)) {
    array_push($categories, $category);
  }
  $sportsArendaIdsString = implode(', ', $sportsArendaIds);
  // $query = "SELECT * FROM sports_arenas WHERE id IN ($sportsArendaIdsString)";
  // $result = mysqli_query($conn, $query);
  // $sportsArenas = [];
  // $citiesIds = [];
  while ($sportsArena = mysqli_fetch_assoc($result)) {
    array_push($sportsArenas, $sportsArena);
    // array_push($citiesIds, $sportsArena['city_id']);
  }
  // $citiesIdsString = implode(', ', $citiesIds);
  // $query = "SELECT * FROM cities WHERE id IN ($citiesIdsString)";
  $result = mysqli_query($conn, $query);
  $cities = [];
  while ($city = mysqli_fetch_assoc($result)) {
    array_push($cities, $city);
  }
  // for ($i = 0; $i < count($sportsArenas); $i++) {
  //   for ($j = 0; $j < count($cities); $j++) {
  //     if ($cities[$j]['id'] === $sportsArenas[$i]['city_id']) {
  //       $sportsArenas[$i]['city'] = $cities[$j];
  //       break;
  //     }
  //   }
  // }
  // for ($i = 0; $i < count($fields); $i++) {
  //   for ($j = 0; $j < count($sportsArenas); $j++) {
  //     if ($sportsArenas[$j]['id'] === $fields[$i]['sports_arena_id']) {
  //       $fields[$i]['sports_arena'] = $sportsArenas[$j];
  //       break;
  //     }
  //   }
  // }
  for ($i = 0; $i < count($fields); $i++) {
    for ($j = 0; $j < count($categories); $j++) {
      if ($categories[$j]['id'] === $fields[$i]['category_id']) {
        $fields[$i]['category'] = $categories[$j];
        break;
      }
    }
  }
  return $fields;
}
function getField($id)
{
  global $conn;
  $query = "SELECT * FROM fields where id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) !== 1) {
    return false;
  }
  $field = mysqli_fetch_assoc($result);
  $query = "SELECT * FROM categories where id={$field['category_id']}";
  $result = mysqli_query($conn, $query);
  $category = mysqli_fetch_assoc($result);
  // $query = "SELECT * FROM sports_arenas where id={$field['sports_arena_id']}";
  // $result = mysqli_query($conn, $query);
  // $sportsArena = mysqli_fetch_assoc($result);
  // $query = "SELECT * FROM partners where id={$sportsArena['partner_id']}";
  // $result = mysqli_query($conn, $query);
  // $partner = mysqli_fetch_assoc($result);
  // $query = "SELECT * FROM cities where id={$sportsArena['city_id']}";
  // $result = mysqli_query($conn, $query);
  $city = mysqli_fetch_assoc($result);
  // $sportsArena['partner'] = $partner;
  // $sportsArena['city'] = $city;
  // $field['sports_arena'] = $sportsArena;
  $field['category'] = $category;
  return $field;
}