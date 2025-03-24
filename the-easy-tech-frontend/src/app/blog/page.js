"use client"
import React, { useEffect, useState } from 'react'

import NavBottom from '@/components/Header/NavBottom/NavBottom'
import NavTop from '@/components/Header/NavTop/NavTop'
import Partner from '@/components/Partner/Partner'
import Footer from '@/components/Footer/Footer';
import BreadCrumb from '@/components/BreadCrumb/BreadCrumb'
import Loader from '@/components/Loader/Loader'
import BlogList from '@/components/Sections/blog/BlogList'

import blog from "@/data/blog.json"

const page = () => {
    const [posts, setPosts] = useState([])
    const [categories, setCategories] = useState([])
    const [loading, setLoading] = useState(true)

    useEffect(() => {
        const fetch = async () => {
            try{
                setLoading(true)

                await new Promise(resolve=>setTimeout(resolve, 500))
                await setPosts(blog)
                await new Promise(resolve=>setTimeout(resolve, 500))
                await setCategories(blog.map(({category})=> ({name: category})))

            } catch(err){
                console.log(err)
            }finally{
                setLoading(false)
            }
        }
        fetch()
    }, [])


    console.log(categories)

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
                    title: "Our Blog",
                    links: [{key: "",val:"Our Services"}],
                    desc: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. In repudiandae asperiores iure animi. Tenetur numquam sit facere consequuntur officia dolore commodi quod maiores sapiente voluptatum explicabo amet, est earum eveniet.",
                }} />

                <BlogList posts={posts} categories={categories} />
            </main>

            <Partner className='lg:mt-[100px] sm:mt-16 mt-10' /> 

            <footer id="footer">
                <Footer />
            </footer>
        </div>
    )
};

export default page;