<?php
  class me {
    var $first_name;
    var $last_name;
    var $address;
    var $postal_code;
    var $city;
    var $phone_number;
    var $email;
  }

  function me() {

  }
  
  function getFirstName() {
    return ($this->first_name);
  }
  function setFirstName($first_name) {
    $this->first_name = $first_name;
  }

  function getLastName() {
    return ($this->last_name);
  }
  function setLastName($last_name) {
    $this->last_name = $last_name;
  }

  function getAddress() {
    return ($this->address);
  }
  function setAddress($address) {
    $this->address = $address;
  }

  function getPostalCode() {
    return ($this->postal_code);
  }
  function setPostalCode($postal_code) {
    $this->postal_code = $postal_code;
  }

  function getCity() {
    return ($this->postal_code);
  }
  function setCity($city) {
    $this->city = $city;
  }

  function getPhoneNumber() {
    return ($this->phoneNumber);
  }
  function setPhoneNumber($phone_number) {
    $this->phone_number = $phone_number;
  }

  function getEmail() {
    return ($this->email);
  }
  function setEmail($email) {
    $this->email = $email;
  }
?>
