"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Image from 'next/image'
import Link from 'next/link'
import { PATH_BLOG_DETAIL } from '@/config/config'

const SectionSideMenu = ({data}) => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return  <div 
        className='w-full xl:w-1/4'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateY(0px)" : "translateY(60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <div className='more-infor border border-line rounded-xl py-8 px-8'>
            <div className='heading6'>The best our Services</div>
            <div className='body3 text-secondary mt-2'>Lorem Ipsum passages, and more recently with desktop</div>
            <div className='list-nav mt-4'>
                {
                    data.data.slice(0,4).map((post,i) => <Link
                            key={i}
                            href={`${PATH_BLOG_DETAIL}/[id]/[slug]`}
                            as={`${PATH_BLOG_DETAIL}/${post.id}/${post.slug}`} 
                            className='nav-item rounded-lg flex-between p-12' 
                        >
                            <div className='text-button text-secondary'>{post.title}</div>
                        </Link>
                    )
                }
            </div> 
        </div>
        <div className='ads-block rounded-lg md:mt-10 mt-6 relative'>
            <div className='bg-img'>
                <Image width={5000} height={5000} src='/ads.webp' /> 
            </div>

            <div className='text flex flex-col justify-between absolute left-0 top-0 w-full h-full p-8'>
                <div className='title'>
                    <div className='heading5 text-white'>Let's Talk</div>
                    <div className='body3 text-white mt-4'>If you have project contact us</div> 
                </div>
                <div className='button-block md:mt-10 mt-6'>
                    <Link className='button-main hover:bg-black hover:text-white inline-block bg-white text-button' href='/contact'>Contact Us</Link>
                </div>
            </div>
        </div>
    </div>
}

export default SectionSideMenu;