<?


Class Dashboard extends CI_Model {

	public function create_user($data) {
		$query = "SELECT id FROM users";
		$result = $this->db->query($query)->num_rows();
		if($result == 0) {
			$query = "INSERT INTO users (email, first_name, last_name, password, sex, birthday, permission, created_at) VALUES (?,?,?,?,?,?,9,NOW())";
			$values = array("{$data['email']}", "{$data['first_name']}", "{$data['last_name']}", "{$data['password']}", "{$data['sex']}", "{$data['birthday']}");
			return $this->db->query($query, $values);
		} else {
			$query = "SELECT * FROM users WHERE email='{$data['email']}'";
			$result = $this->db->query($query)->num_rows();
			if($result >= 1) {
				$this->session->set_flashdata('reg_errors', "User Email Already Exists");
				redirect('/register');
			} else {
				$query = "INSERT INTO users (email, first_name, last_name, password, sex, birthday, permission, created_at) VALUES (?,?,?,?,?,?,1,NOW())";
				$values = array("{$data['email']}", "{$data['first_name']}", "{$data['last_name']}", "{$data['password']}", "{$data['sex']}", "{$data['birthday']}");
				return $this->db->query($query, $values);
			}
		}
	}

	public function get_user_by_email($email) {
		$query = "SELECT * FROM users WHERE email='{$email}'";
		return $this->db->query($query)->result_array();
	}

	public function get_user_by_id($id) {
		$query = "SELECT *, NULL AS password FROM users WHERE id='{$id}'";
		return $this->db->query($query)->row_array();
	}

	public function get_all() {
		$query = "SELECT *, NULL AS password FROM users";
		return $this->db->query($query)->result_array();
	}

	public function edit_user($data) {
		$query = "UPDATE users SET email='{$data['email']}', first_name='{$data["first_name"]}', last_name='{$data["last_name"]}', description='{$data['description']}'
				  WHERE id='{$data['id']}'";
		return $this->db->query($query);
	}

	public function edit_user_password($data) {
		$query = "UPDATE users SET password = '{$data['password']}'
				  WHERE id='{$data['id']}'";
		return $this->db->query($query);
	}

	public function destroy_user($id) {
		$query = "DELETE FROM users WHERE id = {$id}";
		return $this->db->query($query);
	}
	// Messages and Comments
	public function create_message($data){
		if($data != '') {
			$query = "INSERT INTO messages (message, created_at, updated_at, user_id, author, likes) VALUES (?,NOW(),NOW(),?,?,?)";
			$values = array("{$data['message']}", "{$data['user_id']}", "{$data['current']['first_name']}"." "."{$data['current']['last_name']}", "{$data['likes']}");
			return $this->db->query($query, $values);
		}
	}
	public function get_messages() {
         return $this->db->query("SELECT * FROM messages")->result_array();
	}
	public function create_comment($data){
		if($data != '') {
			$query = "INSERT INTO comments (comment, created_at, updated_at, author, messages_id, users_id) VALUES (?,NOW(),NOW(),?,?,?)";
			$values = array("{$data['comment']}", "{$data['current']['first_name']}"." "."{$data['current']['last_name']}", "{$data['messages_id']}", "{$data['user_id']}");
			return $this->db->query($query, $values);
		}
	}
	public function get_comments() {
         return $this->db->query("SELECT * FROM comments")->result_array();
	}
	public function create_private_message($data){
		if($data != '') {
			$query = "INSERT INTO private_messages (message, created_at, updated_at, user_id, author) VALUES (?,NOW(),NOW(),?,?)";
			$values = array("{$data['message']}", "{$data['user_id']}", "{$data['current']['first_name']}"." "."{$data['current']['last_name']}" );
			return $this->db->query($query, $values);
		}
	}
	public function get_private_messages() {
         return $this->db->query("SELECT * FROM private_messages")->result_array();
	}

    public function get_friends($id)
     {
        $query = "SELECT users.id, friend_id, users.first_name, users.last_name, users2.first_name, users2.last_name
                    FROM friends
                    LEFT JOIN users ON users.id = friends.user_id
                    LEFT JOIN users as users2 ON users2.id = friends.friend_id
                    WHERE users.id=$id";

        return $this->db->query($query)->result_array();
     }
     public function get_not_friends($id)
     {
        $query = "SELECT * FROM users WHERE users.id NOT IN (SELECT friends.friend_id FROM friends WHERE friends.user_id = $id) and users.id != $id";
        return $this->db->query($query)->result_array();
     }
     public function add_friend($id,$user)
     {
         $query = "INSERT INTO friends (user_id, friend_id, created_at, updated_at) VALUES (?,?,NOW(),NOW())";
         $values = array($user, $id);
         $this->db->query($query, $values);
         return $this->db->insert_id();
     }
	 public function delete_friend($id,$user)
     {
        $query= "DELETE FROM friends WHERE friends.user_id=? AND friends.friend_id=?";
        $values = array($user, $id);
        return $this->db->query($query,$values);
     }

     public function get_image_by_id($data)
     {
     	$query = "SELECT image, image_id, user_id FROM user_images WHERE user_id={$data}";
        return $this->db->query($query)->result_array();
     }
     public function get_cover_image_by_id($data)
     {
     	$query = "SELECT image, image_id, user_id FROM cover_images WHERE user_id={$data}";
        return $this->db->query($query)->result_array();
     }
     public function get_all_images()
     {
     	$query = "SELECT image, image_id, user_id FROM user_images";
     	return $this->db->query($query)->result_array();
     }
     public function get_birthdays()
     {
     	$query = "SELECT first_name, last_name, birthday FROM users";
        return $this->db->query($query)->result_array();
     }
     public function search_query($data)
     {
     	$query = "SELECT * FROM messages where message like '%".$data."%' or author like '%".$data."%'";
        return $this->db->query($query)->result_array();
     }
     public function update_likes($data)
     {
     	$query = "UPDATE messages SET likes=likes+1 WHERE messages_id = {$data}";
        return $this->db->query($query);
     }
}








