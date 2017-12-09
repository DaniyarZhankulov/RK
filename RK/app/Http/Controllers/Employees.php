<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use \Cache; 


class Employees extends Controller
{
	public function index() {
		$employees = DB::table('employees')
						->leftJoin('dept_emp', function($join){
	           				$join->on('employees.emp_no','=', 'dept_emp.emp_no')
	                			 ->where('dept_emp.to_date','>','2018-01-01'); })
           				->leftJoin('dept_manager', function($join){
           				 	$join->on('employees.emp_no','=', 'dept_manager.emp_no')
                			  	 ->where('dept_manager.to_date','>','2018-01-01'); })
						->leftJoin('salaries', function($join){
           				 	$join->on('employees.emp_no','=', 'salaries.emp_no')
                			  	 ->where('salaries.to_date','>','2018-01-01'); })
						->leftJoin('titles', function($join){
           				 	$join->on('employees.emp_no','=', 'titles.emp_no')
                			  	 ->where('titles.to_date','>','2018-01-01'); })
						->leftJoin('departments', 'dept_emp.dept_no','=', 'departments.dept_no')
						->select('employees.emp_no', 'employees.birth_date', 'first_name', 'last_name', 'gender', 'hire_date', 
								 'dept_manager.dept_no', 'salary', 'title', 'dept_name')->paginate(15);
	    return view('index', compact('employees'));
		/* There could be REDIS
		$minutes = 60000;
	    $key = 'main';
    	$employees = Cache::get($key);
    	if ($employees === null) {
			$employees = DB::table('employees')
						->leftJoin('dept_emp', function($join){
	           				$join->on('employees.emp_no','=', 'dept_emp.emp_no')
	                			 ->where('dept_emp.to_date','>','2018-01-01'); })
           				->leftJoin('dept_manager', function($join){
           				 	$join->on('employees.emp_no','=', 'dept_manager.emp_no')
                			  	 ->where('dept_manager.to_date','>','2018-01-01'); })
						->leftJoin('salaries', function($join){
           				 	$join->on('employees.emp_no','=', 'salaries.emp_no')
                			  	 ->where('salaries.to_date','>','2018-01-01'); })
						->leftJoin('titles', function($join){
           				 	$join->on('employees.emp_no','=', 'titles.emp_no')
                			  	 ->where('titles.to_date','>','2018-01-01'); })
						->leftJoin('departments', 'dept_emp.dept_no','=', 'departments.dept_no')
						->select('employees.emp_no', 'employees.birth_date', 'first_name', 'last_name', 'gender', 'hire_date', 
								 'dept_manager.dept_no', 'salary', 'title', 'dept_name')->paginate(15);	
	    	$result = Cache::add($key, $employees, $minutes);
		}
	    return view('index', compact('employees'));
		*/

		/*   SQL
		$employees = DB::Select('SELECT e.emp_no as emp_no, e.birth_date as birth_date, e.first_name as first_name, e.last_name as last_name, 
										e.gender as gender, e.hire_date as hire_date, de.dept_no as de_dept_no, dm.dept_no as dm_dept_no, 
										s.salary as salary, t.title as title, d.dept_name as dept_name
										FROM employees AS e
											LEFT JOIN dept_emp AS de 
										    	ON e.emp_no = de.emp_no
												AND de.to_date > STR_TO_DATE("01-01-2018","%d-%m-%Y")
											LEFT JOIN dept_manager AS dm 
										    	ON e.emp_no = dm.emp_no
												AND dm.to_date > STR_TO_DATE("01-01-2018","%d-%m-%Y")
											LEFT JOIN salaries AS s 
										    	ON e.emp_no = s.emp_no
												AND s.to_date > STR_TO_DATE("01-01-2018","%d-%m-%Y")
											LEFT JOIN titles AS t 
												ON e.emp_no = t.emp_no
										    	AND t.to_date > STR_TO_DATE("01-01-2018","%d-%m-%Y")
											LEFT JOIN departments AS d 
												ON de.dept_no = d.dept_no;')->paginate(15);*/
	}
	public function department($dept_no) {
		$employees = DB::table('employees')
						->leftJoin('dept_emp', function($join){
	           				$join->on('employees.emp_no','=', 'dept_emp.emp_no')
	                			 ->where('dept_emp.to_date','>','2018-01-01'); })
           				->leftJoin('dept_manager', function($join){
           				 	$join->on('employees.emp_no','=', 'dept_manager.emp_no')
                			  	 ->where('dept_manager.to_date','>','2018-01-01'); })
						->leftJoin('salaries', function($join){
           				 	$join->on('employees.emp_no','=', 'salaries.emp_no')
                			  	 ->where('salaries.to_date','>','2018-01-01'); })
						->leftJoin('titles', function($join){
           				 	$join->on('employees.emp_no','=', 'titles.emp_no')
                			  	 ->where('titles.to_date','>','2018-01-01'); })
						->leftJoin('departments', 'dept_emp.dept_no','=', 'departments.dept_no')		
						->where('dept_emp.dept_no', 'like', '%' . $dept_no)
						->select('employees.emp_no', 'employees.birth_date', 'first_name', 'last_name', 'gender', 'hire_date', 
								 'dept_manager.dept_no', 'salary', 'title', 'dept_name')
                		->paginate(15);
	    return view('index', compact('employees'));
	}
	public function search() {
	    $input = Input::get();
		$name = explode(' ',trim($input['search']));
		$count = count($name);
		$a = 0;
		$b = 0;
		if ($count > 1) {
			$b = 1;
		} elseif ($count < 1) {
	    	return view('index', compact('employees'));
		}
		$employees = DB::table('employees')
						->leftJoin('dept_emp', function($join){
	           				$join->on('employees.emp_no','=', 'dept_emp.emp_no')
	                			 ->where('dept_emp.to_date','>','2018-01-01'); })
           				->leftJoin('dept_manager', function($join){
           				 	$join->on('employees.emp_no','=', 'dept_manager.emp_no')
                			  	 ->where('dept_manager.to_date','>','2018-01-01'); })
						->leftJoin('salaries', function($join){
           				 	$join->on('employees.emp_no','=', 'salaries.emp_no')
                			  	 ->where('salaries.to_date','>','2018-01-01'); })
						->leftJoin('titles', function($join){
           				 	$join->on('employees.emp_no','=', 'titles.emp_no')
                			  	 ->where('titles.to_date','>','2018-01-01'); })
						->leftJoin('departments', 'dept_emp.dept_no','=', 'departments.dept_no')	
						->select('employees.emp_no', 'employees.birth_date', 'first_name', 'last_name', 'gender', 'hire_date', 
								 'dept_manager.dept_no', 'salary', 'title', 'dept_name')
						->orderBy(DB::raw('
								CASE
								  WHEN (first_name = "' . $name[$a] . '" AND  last_name = "' . $name[$b] . '") THEN 1
								  WHEN first_name = "' . $name[$a] . '" THEN 2
								  WHEN first_name LIKE "' . $name[$a] . '%" THEN 4
								  WHEN first_name LIKE "%' . $name[$a] . '" THEN 6
								  WHEN last_name = "' . $name[$b] . '" THEN 3
								  WHEN last_name LIKE "' . $name[$b] . '%" THEN 5
								  WHEN last_name LIKE "%' . $name[$b] . '" THEN 7
								  ELSE 10
								END'))				
                		->paginate(15);
	    return view('index', compact('employees'));
	}
}
