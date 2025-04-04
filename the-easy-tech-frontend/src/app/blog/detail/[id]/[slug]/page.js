"use client"

import React, { useEffect, useState } from 'react'
import Image from 'next/image'

import NavBottom from '@/components/Header/NavBottom/NavBottom'
import NavTop from '@/components/Header/NavTop/NavTop'
import Partner from '@/components/Partner/Partner'
import Footer from '@/components/Footer/Footer';
import BreadCrumb from '@/components/BreadCrumb/BreadCrumb'
import SideMenuSection from '@/components/Sections/blog/SideMenuSection'
import Loader from '@/components/Loader/Loader'
import Blog from '@/components/Blog/Blog'

import { URL_BLOG, URL_IMG } from '@/config/config'
import useFetch from "@/hooks/useFetch"


const page = ({ params }) => {
    const { id, slug } = params
    const [ dataBlogAll, loadingBlogAll ] = useFetch(`${URL_BLOG}/all`)
    const [ dataBlog, loadingBlog ] = useFetch(`${URL_BLOG}/${id}/${slug}`)


    return loadingBlogAll || loadingBlog ? (
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
                    title: "Blog Detail",
                    links: [{key: "/blog",val:"Blog"}, {key: "",val:"Post"}],
                    desc: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. In repudiandae asperiores iure animi. Tenetur numquam sit facere consequuntur officia dolore commodi quod maiores sapiente voluptatum explicabo amet, est earum eveniet.",
                }} />

                <div className='content-detail-block lg:py-[100px] sm:py-16 py-10'>
                    <div className='container'>
                        <div className='flex max-xl:flex-col gap-y-8'>
                            <div className='w-full xl:w-3/4'>
                                <div className='w-full xl:pr-[80px]'>
                                    <div className='heading3'>{dataBlog.data.title}</div>
                                    <div className='bg-img mt-5 mb-5'>
                                        <Image alt={dataBlog.data.title} width={5000} height={5000} className='w-full h-full rounded-xl' src={URL_IMG+"/blog/"+dataBlog.data.image} /> 
                                    </div>
                                    <div className='body2 text-secondary mt-4' dangerouslySetInnerHTML={{ __html: dataBlog.data.desc }} />
                                </div>
                            </div>
                            <SideMenuSection data={dataBlogAll} />
                        </div> 
                    </div> 
                </div>

                <Blog data={dataBlogAll} excluding={id} />
            </main>

            <Partner className='lg:mt-[100px] sm:mt-16 mt-10' /> 

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
};

export default page;