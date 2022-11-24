<?php
/**
 * Class Song med CRUD metoder
 */ 
class User {
	/**
	 * Class properties
	 */
	public $id;
	public $name;
	public $lastname;
	public $username;
	public $password;
	public $email;
	private $db;

	/**
	 * Class Constructor
	 * Metode som kaldes automatisk når der kaldes en instans af klassen
	 * Constructoren globaliserer $db objektet og gør det tilgængeligt i sit scope.
	 * Derefter tildeles det til klassens egen db property
	 */
	public function __construct()
	{	
		global $db;
		$this->db = $db;
	}

	/**
	 * Metode til at hente alle sange----------------------------------------------------------------------
	 */
	public function list() {
		$sql = "SELECT id, name, lastname
				FROM user 
				ORDER BY id";
		return $this->db->query($sql);
	}	
    
	/**
	 * Metode til at hente sang detaljer
	 * @param id (int) Sangens id--------------------------------------------------------------------------
	 */
		public function details($id) {
			$params = array(
				'id' => array($id, PDO::PARAM_INT)
			);

			$sql = "SELECT name, lastname, username, password, email 
					FROM user 
					WHERE id = :id";
			return $this->db->query($sql, $params, Db::RESULT_SINGLE);
		}

		/**
		 * Metode til at oprette sang med------------------------------------------------------------------
		 */
		public function create() {
			$params = array(
				'name' => array($this->title, PDO::PARAM_STR),
				'lastname' => array($this->title, PDO::PARAM_STR),
				'username' => array($this->title, PDO::PARAM_STR),
				'password' => array($this->content, PDO::PARAM_STR),
				'email' => array($this->artist_id, PDO::PARAM_INT)
			);

			$sql = "INSERT INTO user(name, lastname, username, password, email) 
					VALUES(:name, :lastname, :username, :password, :email)";
			$this->db->query($sql, $params);
			return $this->db->lastInsertId();
		}

		/**
		 * Metode til at opdatere en sang med
		 * Skal have sangens id med i form body------------------------------------------------------------
		 */
		public function update() {
			$params = array(
				'id' => array($this->id, PDO::PARAM_INT),
				'name' => array($this->title, PDO::PARAM_STR),
				'lastname' => array($this->title, PDO::PARAM_STR),
				'username' => array($this->title, PDO::PARAM_STR),
				'password' => array($this->content, PDO::PARAM_STR),
				'email' => array($this->artist_id, PDO::PARAM_INT)
			);

			$sql = "UPDATE user SET 
					name = :name,
					lastname = :lastname,
					username = :username,
					password = :password,
					email = :email 
					WHERE id = :id";
				
			return $this->db->query($sql, $params);
		}

		/**
		 * Metode til at slette en sang med
		 * @param id (int) Sangens id----------------------------------------------------------------------
		 */
		public function delete($id) {
			$params = array(
				'id' => array($id, PDO::PARAM_INT)
			);
			
			$sql = "DELETE FROM user 
					WHERE id = :id";
			return $this->db->query($sql, $params);
		}
}