<?php

namespace App\Http\Controllers\Web\Tag\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Main\Domain\CoolWord\Tag;
use Main\Domain\CoolWord\TagRepository;

class CreateController extends Controller
{
    public function __construct(private readonly TagRepository $tagRepository)
    {
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request // TODO: form request
     */
    public function __invoke(Request $request): RedirectResponse
    {
        // TODO: check duplicated

        $tag = Tag::new(name: $request->get('name'));

        $tagId = $this->tagRepository->store($tag);
        $newTag = $this->tagRepository->findById($tagId);

        return redirect()->route('admin.tags.show', ['id' => $newTag->id()->value])
            ->with('success_msg', '作成成功');
    }
}