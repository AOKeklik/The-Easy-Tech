"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Image from 'next/image'
import Link from 'next/link'
import * as Icon from '@phosphor-icons/react/dist/ssr'

const CaseStudyItem = ({casestudy,i}) => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        className='w-full' 
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateY(0px)" : "translateY(60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <div className='case-study-item'>
            <div className='bg-img'>
                <Image 
                    src={`/case${i}.webp`} 
                    width={5000} 
                    height={5000} 
                    className='w-full h-full block' 
                    alt='img' 
                /> 
            </div>
            <div className='text flex flex-col justify-between gap-3'>
                <div className='heading5'>
                    <Link className='text-white' href='/'>{casestudy.title}</Link> 
                </div>
                <div className='body2 text-white'>{casestudy.desc}</div>
                <Link className='flex items-center gap-1' href='/'>
                    <div className='text-button text-white'>Read More</div>
                    <Icon.CaretDoubleRight weight='bold' className='text-xs text-white mt-1' />
                </Link> 
            </div> 
        </div> 
    </div>
};

export default CaseStudyItem;