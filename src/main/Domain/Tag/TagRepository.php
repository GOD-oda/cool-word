<?php

declare(strict_types=1);

namespace Main\Domain\Tag;

/**
 * TODO: test
 */
interface TagRepository
{
    public function store(Tag $tag): TagId;

    public function findById(TagId $tagId): ?Tag;

    public function findByIds(array $ids): TagCollection;

    public function findByName(Tag $tag): ?Tag;

    public function count(array $where = []): int;

    public function index(int $page, int $perPage, array $where = []): TagCollection;

    public function all(): TagCollection;
}
