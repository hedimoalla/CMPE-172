<?php

  // validate data presence
  // uses trim() so empty spaces don't count
  // uses === to avoid false positives
  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

  // validate data presence
  // reverse of is_blank()
  function has_presence($value) {
    return !is_blank($value);
  }

  // helper function
  // validate string length
  // spaces count towards length
  // use trim() if spaces should not count
  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

  // helper function
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

  // helper function
  // validate string length
  // spaces count towards length
  // use trim() if spaces should not count
  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  // validate string length
  // combines functions_greater_than, _less_than, _exactly
  // spaces count towards length
  // use trim() if spaces should not count
  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'])) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'])) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // validate inclusion in a set
  function has_inclusion_of($value, $set) {
  	return in_array($value, $set);
  }

  // validate exclusion from a set
  function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

  // validate inclusion of character(s)
  // strpos returns string start position or false
  // uses !== to prevent position 0 from being considered false
  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  // validate correct format for email addresses
  // format: [chars]@[chars].[2+ letters]
  // preg_match is helpful, uses a regular expression
  // returns 1 for a match, 0 for no match
  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }

?>
