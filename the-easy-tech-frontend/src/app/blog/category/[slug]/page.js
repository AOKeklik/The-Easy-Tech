"use client"
import React from 'react'

import NavBottom from '@/components/Header/NavBottom/NavBottom'
import NavTop from '@/components/Header/NavTop/NavTop'
import Partner from '@/components/Partner/Partner'
import Footer from '@/components/Footer/Footer';
import BreadCrumb from '@/components/BreadCrumb/BreadCrumb'
import Loader from '@/components/Loader/Loader'
import BlogList from '@/components/Sections/blog/BlogList'

import useFetch from '@/hooks/useFetch'
import { URL_BLOG_CATEGORY } from '@/config/config'

const page = ({params}) => {
    const { slug } = params
    const [ dataBlogAll, loadingBlogAll ] = useFetch(`${URL_BLOG_CATEGORY}/${slug}`)
    const [ dataCategoryAll, loadingCategoryAll ] = useFetch(`${URL_BLOG_CATEGORY}/all`)


    return loadingBlogAll || loadingCategoryAll ? (
        <Loader /> 
    ) : (
        <div className="overflow-x-hidden">
            <header id="header">
                <NavTop />
                <NavBottom />
            </header>


            <main className="content">
                <BreadCrumb {...{
                    img:"/header.webp",
                    title: "Our Blog",
                    links: [{key: "",val:"Our Services"}],
                    desc: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. In repudiandae asperiores iure animi. Tenetur numquam sit facere consequuntur officia dolore commodi quod maiores sapiente voluptatum explicabo amet, est earum eveniet.",
                }} />

                <BlogList blog={dataBlogAll} category={dataCategoryAll} />
            </main>

            <Partner className='lg:mt-[100px] sm:mt-16 mt-10' /> 

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
};

export default page;