<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: JeffreyZhang
 * Date: 13-11-13
 * Time: 上午8:42
 */
class Blog_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // 如果$blogId为空，返回所有博客文章，否则返回特定文章
    // return $blog[]
    public function get_blogs($blogId) {
        $blog = array();
        if ($blogId !== null && $blogId!="c") {
            $query = $this->db->get_where('blog', array('id' => $blogId));
            if ($query->num_rows() == 1) {
                foreach ($query->result() as $row) {
                    $blog['id'] = $row->id;
                    $blog['title'] = $row->title;
                    $blog['author'] = $row->author;
                    $blog['genre'] = $row->genre;
                    $blog['summary'] = $row->summary;
                    $blog['body'] = $row->body;
                    $blog['time'] = $row->time;
                    $blog['feature_img']=$row->feature_img;
                }
                return $blog;
            }
        } else {
            $query = $this->db->get('blog');
            if ($query->num_rows() !== 0) {
                foreach ($query->result() as $row) {
                    $blog['id'][] = $row->id;
                    $blog['title'][] = $row->title;
                    $blog['author'][] = $row->author;
                    $blog['genre'][] = $row->genre;
                    $blog['summary'][] = $row->summary;
                    $blog['body'][] = $row->body;
                    $blog['time'][] = $row->time;
                    $blog['feature_img'][]=$row->feature_img;
                }
                return $blog;
            }
        }
        return -1;
    }

    function insert_blog($data) {
        $this->db->insert('blog', $data);
        return;
    }

    function update_blog($blogId, $data) {
        $id = $blogId;
        $this->db->where('id', $id);
        $this->db->update('blog', $data);
        return;
    }

    function delete_blog($blogId) {
        $id = $blogId;
        $this->db->delete('blog', array('id' => $id));
        return;
    }

}
