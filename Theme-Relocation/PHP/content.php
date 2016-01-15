<?php

/**
 * Pickup random image for property
 * @param string $size
 * @return mixed
 */
function get_image($size = 'large') {
  static $images;
  if(empty($images)){
    for($i = 1; $i<=12; $i++) {
      $images[] = 'assets/img/tmp/properties/' . $size . '/' . $i . '.jpg';
    }
  }

  $key = array_rand($images);

  $value = $images[$key];
  unset($images[$key]);

  return $value;
}


/**
 * Pickup random image for agent
 * @param string $size
 * @return mixed
 */
function get_agent_image($size = 'medium') {
  static $agent_images;
  if(empty($agent_images)){
    for($i = 1; $i<=4; $i++) {
      $agent_images[] = 'assets/img/tmp/agents/' . $size . '/' . $i . '.jpg';
    }
  }

  $key = array_rand($agent_images);

  $value = $agent_images[$key];
  unset($agent_images[$key]);

  return $value;
}

/**
 * Get number representing area
 * @return int
 */
function get_area() {
  return rand(120, 350);
}

/**
 * Get random number - used for bathrooms, bedrooms...
 * @return int
 */
function get_number() {
  return rand(1,3);
}

/**
 * Return random location - don't repeat if not necessary
 * @return mixed
 */
function get_location() {
  static $locations;

  if(empty($locations)) {
    $locations = array(
      'Brooklyn',
      'Manhattan',
      'Silicon Valley, SA',
      'Palo Alto, SA',
      'Kingman Park',
      'Civic Betterment',
    );
  }

  $key = array_rand($locations);

  $value = $locations[$key];
  unset($locations[$key]);

  return $value;
}

/**
 * Return random title - don't repeat if not necessary
 * @return mixed
 */
function get_title() {

  static $titles;

  if(empty($titles)) {
    $titles = array(
      'Everett Ave',
      'Fife Ave',
      'Emerson Street',
      'Culver Blvd',
      'McLaugh Ave',
      'Jefferson Blvd',
      'West Side',
      'South St',
      'Evergreen Tr',
      'Jeopardy Ln',
      'Hansbury Ave',
      'St Johns Pl',
      'Bedford Ave',
    );
  }

  $key = array_rand($titles);

  $value = $titles[$key];
  unset($titles[$key]);

  return $value;
}

/**
 * Return random price
 * @param string $type
 * @return mixed
 */
function get_price($type = 'sale') {

  if($type == 'sale') {
    $values =  array(
      '$ 299 000',
      '$ 350 000',
      '$ 145 000',
      '$ 545 000',
      '$ 430 000',
    );

    $key = array_rand($values);

    return $values[$key];
  }

  $values =  array(
    '$ 1900 / month',
    '$ 1200 / month',
    '$ 2400 / month',
    '$ 850 / month',
    '$ 1500 / month',
  );

  $key = array_rand($values);
  return $values[$key];
}