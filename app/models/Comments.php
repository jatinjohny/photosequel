<?php # Script Comments.php



class Comments
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

//
//	public function get($attribute)
//	{
//
//		return $this->$attribute;
//	}
//
//	public function set($attribute, $value)
//	{
//
//		$this->$attribute = $value;
//	}

	public function getCommentsOfPhoto($photo_id)
	{

		// Prepare Query
		$sql = "SELECT * FROM comment WHERE photographId=:photo_id"
			 . ' ORDER BY posted ASC';

		$query = $this->db->prepare($sql);

		$param = [
			':photo_id' => $photo_id
		];

		$query->execute($param);

		return $query->fetchAll();

	}

	// Create new admin into the database
	public function postCommentOnPhoto($photoId, $posted, $author, $body)
	{
		// prepare statement
		$sql = 'INSERT INTO comment(photographId, posted, author,body) '
			. 'VALUES (:photographId, :posted, :author, :body)';

		$query = $this->db->prepare($sql);

		$query->bindParam(':photographId', $photoId, PDO::PARAM_INT);
		$query->bindParam(':posted', $posted);
		$query->bindParam(':author', $author);
		$query->bindParam(':body', $body);


		$query->execute();
		//$this->commentId = $this->db->lastInsertId();
	}

	private function findBy($field, $value)
	{
		$sql = '';
		switch($field){
			case 'id':
				$sql = "SELECT * FROM comment WHERE commentId=:value";
				break;
			default:
				break;
		}

		$query = $this->db->prepare($sql);

		$query->execute([':value' => $value]);

		return $query->fetch();

	}

	public function deleteComment($commentId)
	{

		$comment  = $this->findBy('id', $commentId);

		$sql = "DELETE FROM comment WHERE commentId=:id";

		$query = $this->db->prepare($sql);

		$query->execute([':id' => $comment->commentId ]);
	}
}