"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Image from 'next/image'
import Link from 'next/link'
import * as Icon from '@phosphor-icons/react/dist/ssr'
import { PATH_BLOG_DETAIL, URL_IMG } from '@/config/config';
import { formatDate } from '@/utils/dateFormatter';

const BlogItem = ({post}) => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        className='blog-item'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateY(0px)" : "translateY(60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <Link 
            href={`${PATH_BLOG_DETAIL}/[slug]`}
            as={`${PATH_BLOG_DETAIL}/${post.id}/${post.slug}`}
            className='blog-item-main h-full block bg-white border border-line overflow-hidden rounded-2xl hover-box-shadow duration-500' 
        >

            <div className='bg-img w-full overflow-hidden'>
                <Image width={5000} height={5000} className='w-full h-full block' src={URL_IMG+"/blog/"+post.image} alt={post.title} /> 
            </div>

            <div className='infor sm:p-6 p-4'>
                <div className='caption2 py-1 px-3 bg-surface rounded-full inline-block capitalize bg-blue-100'>{post.category_name}</div>
                <div className='heading6 mt-2'>{post.title}</div>

                <div className='date flex items-center gap-4 mt-2'>
                    <div className='author caption2 text-secondary'>
                    by <span className='text-on-surface'>Admin</span>
                    </div>
                    <div className='item-date flex items-center'>
                        <Icon.CalendarBlank weight='bold'/>
                        <span className='ml-1 caption2'>{formatDate(post.created_at)}</span>
                    </div> 
                </div> 
            </div> 
        </Link>                
    </div>  
};

export default BlogItem;