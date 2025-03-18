<?php 

	class Education	{
		private $id;
		private $name;
		private $address;
		private $type;
		private $lat;
		private $lng;
		private $link;
		private $conn;
		private $tableName = "language_school_info";

		// Setters and getters for private properties
		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setAddress($address) { $this->address = $address; }
		function getAddress() { return $this->address; }
		function setType($type) { $this->type = $type; }
		function getType() { return $this->type; }
		function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }
		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }
		function setLink($link) { $this->link = $link; }
		function getLink() { return $this->link; }

		// Constructor method to connect to the database
		public function __construct() {
			require_once('Db_connect.php');
			$conn = new DbConnect;
			$this->conn = $conn->connect();
		}

		// Method to fetch colleges with blank latitudes and longitudes
		public function getCollegesBlankLatLng() {
			$sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		// Method to fetch all colleges
		public function getAllColleges() {
			$sql = "SELECT * FROM $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		// Method to update colleges with latitude and longitude
		public function updateCollegesWithLatLng() {
			$sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng, link = :link WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':lat', $this->lat);
			$stmt->bindParam(':lng', $this->lng);
			$stmt->bindParam(':link', $this->link);
			$stmt->bindParam(':id', $this->id);

			if($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		}
	}

?>
