<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    public function viewArticleList(){
        $articles = Blog::paginate(10);
        return view('listArticle', compact('articles'));
    }

    public function viewArticle(int $articleId){
        $article = $this->getArticleData($articleId);
        return view('viewArticle', compact('article'));
    }

    public function viewAddArticle(){
        return view('addArticle');
    }

    public function viewEditArticle(int $articleId){
        $article = $this->getArticleData($articleId);
        return view('editArticle', compact('article'));
    }

    public function viewDeleteArticle(int $articleId){
        $article = $this->getArticleData($articleId);
        return view('deleteArticle', compact('article'));
    }

    public function addArticle(Request $request){
        $request->validate($this->getValidationRules('addArticle'));

        $article = new Blog([
            'title' => $request['title'],
            'author' => $request['author'],
            'content' => $request['content'],
            'banner_img' => 'banner',
            'status' => 'draft'
        ]);

        $article->save();

        return redirect('/')->with('status', 'Article has been added successfully');
    }

    public function editArticle(Request $request){
        $request->validate($this->getValidationRules('editArticle'));

        $articleId = $request['id'];
        $article = $this->getArticleData($articleId);

        $article->title = $request['title'];
        $article->author = $request['author'];
        $article->content = $request['content'];
        $article->status = $request['status'];

        $article->save();

        return redirect('/')->with('status', 'Updated successfully');
    }

    public function deleteArticle(Request $request){
        $articleId = $request['id'];
        $article = $this->getArticleData($articleId);
        $article->delete();
        return redirect('/')->with('status', 'Deleted successfully');
    }

    private function getArticleData(int $articleId){
        return Blog::find($articleId);
    }

    private function getValidationRules(string $action): array{
        $rules = [
            'title' => 'required|max:60',
            'author' => 'required|max:120',
            'content' => 'required',
        ];
        if($action == 'editArticle'){
            $rules['status'] = Rule::in(['draft', 'published']);
        }
        return $rules;
    }

}
