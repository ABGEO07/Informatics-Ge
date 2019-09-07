<?php

namespace App\Controller;

use App\Repository\ProblemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\Translation\TranslatorInterface;

class ProblemController extends AbstractController
{
    private $_repository;
    private $_translator;

    /**
     * ProblemController constructor.
     *
     * @param ProblemRepository $repository
     * @param TranslatorInterface $translator
     */
    public function __construct(ProblemRepository $repository, TranslatorInterface $translator)
    {
        $this->_repository = $repository;
        $this->_translator = $translator;
    }

    /**
     * Show Problems listing page.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list()
    {
        $problems = $this->_repository
            ->findVisibleForListing();

        return $this->render('problem/list.html.twig', [
            'problems' => $problems,
        ]);
    }

    /**
     * Show single problem.
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function single($id)
    {
        $problem = $this->_repository
            ->find($id);

        // Return 404 page if problem not found or
        // problem is not visible and user is not a admin.
        if (
            null === $problem
            || (
                !$problem->getVisible()
                && !$this->isGranted(['ROLE_SUPER_ADMIN', 'ROLE_ADMIN'])
            )
        ) {
            throw new NotFoundHttpException($this->_translator->trans('problem_not_found', ['%problem_id%' => $id]));
        }

        return $this->render('problem/problem.html.twig', [
            'problem' => $problem,
        ]);
    }
}