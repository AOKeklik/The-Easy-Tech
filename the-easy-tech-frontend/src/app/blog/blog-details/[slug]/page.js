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

import blog from "@/data/blog.json"

const page = () => {
    const [data, setData] = useState([])
    const [loading, setLoading] = useState(true)

    useEffect(() => {
        const fetch = async () => {
            try{
                setLoading(true)

                await new Promise(resolve=>setTimeout(resolve, 1000))
                await setData(blog)

            } catch(err){
                console.log(err)
            }finally{
                setLoading(false)
            }
        }
        fetch()
    }, [])

    return loading ? (
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
                                    <div className='heading3'>Lorem ipsum dolor sit.</div>
                                    <div className='bg-img mt-5 mb-5'>
                                        <Image width={5000} height={5000} className='w-full h-full rounded-xl' src="/gateway1.webp" /> 
                                    </div>
                                    <div className='body2 text-secondary mt-4'>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus eum dicta commodi non repellat quibusdam necessitatibus, sit asperiores eos esse ad aut voluptatum aliquid corrupti. Illum deserunt praesentium libero mollitia?
                                    </div> 
                                </div>
                            </div>
                            <SideMenuSection posts={data} />
                        </div> 
                    </div> 
                </div>

                <Blog posts={data} />
            </main>

            <Partner className='lg:mt-[100px] sm:mt-16 mt-10' /> 

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
};

export default page;