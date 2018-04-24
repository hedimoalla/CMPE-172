<?php
    function find_all_departments() {
        global $db;

        $sql = "SELECT * FROM departments ";
        $sql .= "ORDER BY dept_no ASC";
        $result = mysqli_query($db, $sql); 
        confirm_result_set($result);
        return $result;
    }

    function find_all_department_managers() {
        global $db;
        
        $sql = "SELECT * FROM dept_manager ";
        $sql .= "ORDER BY emp_no ASC";
        $result = mysqli_query($db, $sql); 
        confirm_result_set($result);
        return $result;
    }

    function find_all_department_employees() {
        global $db;
        
        $sql = "SELECT * FROM dept_emp ";
        $sql .= "ORDER BY emp_no ASC";
        $result = mysqli_query($db, $sql); 
        confirm_result_set($result);
        return $result;
    }

    function find_all_admins() {
        global $db;

        $sql = "SELECT * FROM admins ";
        $sql .= "ORDER BY last_name ASC, first_name ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_employees() {
        global $db;

        $sql = "SELECT * FROM employees ";
        $sql .= "ORDER BY emp_no ASC";
        $result = mysqli_query($db, $sql); 
        confirm_result_set($result);
        return $result;
    }

    function find_all_salaries() {
        global $db;

        $sql = "SELECT * FROM salaries ";
        $sql .= "ORDER BY emp_no ASC";
        $result = mysqli_query($db, $sql); 
        confirm_result_set($result);
        return $result;
    }

    function find_all_titles() {
        global $db;

        $sql = "SELECT * FROM titles ";
        $sql .= "ORDER BY emp_no ASC";
        $result = mysqli_query($db, $sql); 
        confirm_result_set($result);
        return $result;
    }

    function find_department_by_no($dept_no) {
        global $db;

        $sql = "SELECT * FROM departments ";
        $sql .= "WHERE dept_no='" . $dept_no . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $department = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $department; // returns an associated array
    }

    function find_department_manager_by_emp_no($emp_no) {
        global $db;

        $sql = "SELECT * FROM dept_manager ";
        $sql .= "WHERE emp_no='" . $emp_no . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $department_man = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $department_man; // returns an associated array
    }

    function find_department_employee_by_emp_no($emp_no) {
        global $db;

        $sql = "SELECT * FROM dept_emp ";
        $sql .= "WHERE emp_no='" . $emp_no . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $department_emp = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $department_emp; // returns an associated array
    }

    function find_admin_by_id($id) {
        global $db;

        $sql = "SELECT * FROM admins ";
        $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $admin = mysqli_fetch_assoc($result); // find first
        mysqli_free_result($result);
        return $admin; // returns an assoc. array
    }

    function find_employee_by_emp_no($emp_no) {
        global $db;

        $sql = "SELECT * FROM employees ";
        $sql .= "WHERE emp_no='" . $emp_no . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $employee = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $employee; // returns an associated array
    }

    function find_salary_by_emp_no($emp_no) {
        global $db;

        $sql = "SELECT * FROM salaries ";
        $sql .= "WHERE emp_no='" . $emp_no . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $salary = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $salary; // returns an associated array
    }

    function find_title_by_emp_no($emp_no) {
        global $db;

        $sql = "SELECT * FROM titles ";
        $sql .= "WHERE emp_no='" . $emp_no . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $title = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $title; // returns an associated array
    }

    function validate_department($department) {

        $errors = [];
        
        // dept_no
        if(is_blank($department['dept_no'])) {
            $errors[] = "Department number cannot be blank.";
        }
        if(!has_length($subject['dept_no'], ['min' => 2, 'max' => 255])) {
            $errors[] = "Name must be between 2 and 255 characters.";
        }

        return $errors;
    }

    function validate_admin($admin) {

    if(is_blank($admin['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($admin['email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    if(is_blank($admin['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($admin['username'], array('min' => 8, 'max' => 255))) {
      $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
      $errors[] = "Username not allowed. Try another.";
    }

    if(is_blank($admin['password'])) {
      $errors[] = "Password cannot be blank.";
    } elseif (!has_length($admin['password'], array('min' => 12))) {
      $errors[] = "Password must contain 12 or more characters";
    } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 uppercase letter";
    } elseif (!preg_match('/[a-z]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 lowercase letter";
    } elseif (!preg_match('/[0-9]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 number";
    } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 symbol";
    }

    if(is_blank($admin['confirm_password'])) {
      $errors[] = "Confirm password cannot be blank.";
    } elseif ($admin['password'] !== $admin['confirm_password']) {
      $errors[] = "Password and confirm password must match.";
    }

    return $errors;
  }


    function insert_department($department) {
        global $db;

        // $errors = validate_department($department);
        //     if (!empty($errors)) {
        //         return $errors;
        //     }

        $sql = "INSERT INTO departments ";
        $sql .= "(dept_no, dept_name) ";
        $sql .= "VALUES (";
        $sql .= "'" . $department['dept_no'] . "', ";
        $sql .= "'" . $department['dept_name'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // Insert Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function insert_department_manager($department_man) {
        global $db;

        $sql = "INSERT INTO dept_manager ";
        $sql .= "(emp_no, dept_no, from_date, to_date) ";
        $sql .= "VALUES (";
        $sql .= "'" . $department_man['emp_no'] . "', ";
        $sql .= "'" . $department_man['dept_no'] . "', ";
        $sql .= "'" . $department_man['from_date'] . "', ";
        $sql .= "'" . $department_man['to_date'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // Insert Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function insert_department_employee($department_emp) {
        global $db;

        $sql = "INSERT INTO dept_emp ";
        $sql .= "(emp_no, dept_no, from_date, to_date) ";
        $sql .= "VALUES (";
        $sql .= "'" . $department_emp['emp_no'] . "', ";
        $sql .= "'" . $department_emp['dept_no'] . "', ";
        $sql .= "'" . $department_emp['from_date'] . "', ";
        $sql .= "'" . $department_emp['to_date'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // Insert Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function insert_admin($admin) {
        global $db;

        $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO admins ";
        $sql .= "(first_name, last_name, email, username, hashed_password) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
        $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
        $sql .= "'" . db_escape($db, $admin['email']) . "',";
        $sql .= "'" . db_escape($db, $admin['username']) . "',";
        $sql .= "'" . db_escape($db, $hashed_password) . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);

        // For INSERT statements, $result is true/false
        if($result) {
        return true;
        } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
     }

     function insert_employee($employee) {
        global $db;

        $sql = "INSERT INTO employees ";
        $sql .= "(emp_no, birth_date, first_name, last_name, gender, hire_date) ";
        $sql .= "VALUES (";
        $sql .= "'" . $employee['emp_no'] . "', ";
        $sql .= "'" . $employee['birth_date'] . "', ";
        $sql .= "'" . $employee['first_name'] . "', ";
        $sql .= "'" . $employee['last_name'] . "', ";
        $sql .= "'" . $employee['gender'] . "', ";
        $sql .= "'" . $employee['hire_date'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // Insert Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function insert_salary($salary) {
        global $db;

        $sql = "INSERT INTO salaries ";
        $sql .= "(emp_no, salary, from_date, to_date) ";
        $sql .= "VALUES (";
        $sql .= "'" . $salary['emp_no'] . "', ";
        $sql .= "'" . $salary['salary'] . "', ";
        $sql .= "'" . $salary['from_date'] . "', ";
        $sql .= "'" . $salary['to_date'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // Insert Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function insert_title($title) {
        global $db;

        $sql = "INSERT INTO titles ";
        $sql .= "(emp_no, title, from_date, to_date) ";
        $sql .= "VALUES (";
        $sql .= "'" . $title['emp_no'] . "', ";
        $sql .= "'" . $title['title'] . "', ";
        $sql .= "'" . $title['from_date'] . "', ";
        $sql .= "'" . $title['to_date'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // Insert Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function update_department($department) {
        global $db;

        // $errors = validate_department($department);
        //     if (!empty($errors)) {
        //         return $errors;
        //     }
        
        $sql = "UPDATE departments SET ";
        $sql .= "dept_no='" . $department['dept_no'] . "', ";
        $sql .= "dept_name='" . $department['dept_name'] . "' ";
        $sql .= "WHERE dept_no='" . $department['dept_no'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if ($result) {
        return true;
        } else {
        // UPDATE Failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
     }

     function update_department_manager($department_man) {
        global $db;

        $sql = "UPDATE dept_manager SET ";
        $sql .= "emp_no='" . $department_man['emp_no'] . "', ";
        $sql .= "dept_no='" . $department_man['dept_no'] . "', ";
        $sql .= "from_date='" . $department_man['from_date'] . "', ";
        $sql .= "to_date='" . $department_man['to_date'] . "'  ";
        $sql .= "WHERE emp_no='" . $department_man['emp_no'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if ($result) {
        return true;
        } else {
        // UPDATE Failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
     }

     function update_department_employee($department_emp) {
        global $db;

        $sql = "UPDATE dept_emp SET ";
        $sql .= "emp_no='" . $department_emp['emp_no'] . "', ";
        $sql .= "dept_no='" . $department_emp['dept_no'] . "', ";
        $sql .= "from_date='" . $department_emp['from_date'] . "', ";
        $sql .= "to_date='" . $department_emp['to_date'] . "'  ";
        $sql .= "WHERE emp_no='" . $department_emp['emp_no'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if ($result) {
        return true;
        } else {
        // UPDATE Failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
     }

     function update_admin($admin) {
        global $db;
        // is_blank

        $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

        // $sql = "UPDATE admins SET ";
        // $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
        // $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
        // $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
        // if($password_sent) {
        // $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "', ";
        // }
        // $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
        // $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
        // $sql .= "LIMIT 1";
        // $result = mysqli_query($db, $sql);

        $sql = "UPDATE admins SET ";
        $sql .= "first_name='" . $admin['first_name'] . "', ";
        $sql .= "last_name='" . $admin['last_name'] . "', ";
        $sql .= "email='" . $admin['email'] . "', ";
        $sql .= "username='" . $admin['username'] . "', ";
        $sql .= "hashed_password='" . $hashed_password . "'  ";
        $sql .= "WHERE id='" . $admin['id'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if($result) {
        return true;
        } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }

     }

     function update_employee($employee) {
        global $db;
        
        $sql = "UPDATE employees SET ";
        $sql .= "birth_date='" . $employee['birth_date'] . "', ";
        $sql .= "first_name='" . $employee['first_name'] . "', ";
        $sql .= "last_name='" . $employee['last_name'] . "', ";
        $sql .= "gender='" . $employee['gender'] . "', ";
        $sql .= "hire_date='" . $employee['hire_date'] . "' ";
        $sql .= "WHERE emp_no='" . $employee['emp_no'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if ($result) {
        return true;
        } else {
        // UPDATE Failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
     }

     function update_salary($salary) {
        global $db;

        $sql = "UPDATE salaries SET ";
        $sql .= "emp_no='" . $salary['emp_no'] . "', ";
        $sql .= "salary='" . $salary['salary'] . "', ";
        $sql .= "from_date='" . $salary['from_date'] . "', ";
        $sql .= "to_date='" . $salary['to_date'] . "'  ";
        $sql .= "WHERE emp_no='" . $salary['emp_no'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if ($result) {
        return true;
        } else {
        // UPDATE Failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
     }

     function update_title($title) {
        global $db;

        $sql = "UPDATE titles SET ";
        $sql .= "emp_no='" . $title['emp_no'] . "', ";
        $sql .= "title='" . $title['title'] . "', ";
        $sql .= "from_date='" . $title['from_date'] . "', ";
        $sql .= "to_date='" . $title['to_date'] . "'  ";
        $sql .= "WHERE emp_no='" . $title['emp_no'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if ($result) {
        return true;
        } else {
        // UPDATE Failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
     }

     function delete_department($id) {
        global $db;

        $sql = "DELETE FROM departments ";
        $sql .= "WHERE dept_no='" . $id . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // DELETE Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function delete_department_manager($id) {
        global $db;

        $sql = "DELETE FROM dept_manager ";
        $sql .= "WHERE emp_no='" . $id . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // DELETE Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function delete_department_employee($id) {
        global $db;

        $sql = "DELETE FROM dept_emp ";
        $sql .= "WHERE emp_no='" . $id . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // DELETE Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function delete_admin($id) {
        global $db;

        $sql = "DELETE FROM admins ";
        $sql .= "WHERE id='" . $id . "' ";
        $sql .= "LIMIT 1;";
        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if($result) {
        return true;
        } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
     }

     function delete_employee($id) {
         global $db;

        $sql = "DELETE FROM employees ";
        $sql .= "WHERE emp_no='" . $id . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // DELETE Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function delete_salary($id) {
         global $db;

        $sql = "DELETE FROM salaries ";
        $sql .= "WHERE emp_no='" . $id . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // DELETE Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     function delete_title($id) {
         global $db;

        $sql = "DELETE FROM titles ";
        $sql .= "WHERE emp_no='" . $id . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // DELETE Failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
     }

     
?>